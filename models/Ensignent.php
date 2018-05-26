<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ensignent".
 *
 * @property int $id
 * @property string $nom
 * @property string $prenom
 * @property string $date_naissance
 */
class Ensignent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ensignent';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_naissance'], 'safe'],
            [['nom', 'prenom'], 'string', 'max' => 254],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nom' => 'Nom',
            'prenom' => 'Prenom',
            'date_naissance' => 'Date Naissance',
        ];
    }
}
