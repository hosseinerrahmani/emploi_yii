<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "salle".
 *
 * @property int $id
 * @property string $titre
 * @property string $type
 * @property string $description
 */
class Salle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'salle';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titre', 'type', 'description'], 'required'],
            [['type', 'description'], 'string'],
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
            'titre' => 'Nom de  salle',
            'type' => 'Type de salle',
            'description' => 'information sur supelementaire',
        ];
    }
}
