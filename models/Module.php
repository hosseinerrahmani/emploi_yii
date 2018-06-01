<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "module".
 *
 * @property int $id
 * @property string $titre
 * @property string $description
 */
class Module extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'module';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titre', 'description'], 'required'],
            [['description'], 'string'],
            [['titre'], 'string', 'max' => 254],
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
        ];
    }


    /**
     * get teacher and module associated
     *
     */
    public function getEnsignentmodule(){
        return $this->hasMany(Ensignentmodule::className(),['id_module'=>'id']);
    }
    /**
     * get programme associated
     *
     */
    public function getGroupemodule(){
        return $this->hasMany(Groupemodule::className(),['id_module'=>'id']);
    }
}
