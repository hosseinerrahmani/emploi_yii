<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "group".
 *
 * @property int $id
 * @property string $titre
 * @property string $description
 * @property string $filiere
 * @property int $nombre
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titre', 'description', 'filiere', 'nombre'], 'required'],
            [['titre', 'description', 'filiere'], 'string'],
            [['nombre'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titre' => 'Titre',
            'description' => 'Description',
            'filiere' => 'Filiere',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * get programme associated
     *
     */
    public function getGroupemodule(){
        return $this->hasMany(Groupemodule::className(),['id_group'=>'id']);
    }
}
