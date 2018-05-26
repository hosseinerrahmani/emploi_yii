<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ensignentmodule".
 *
 * @property int $id
 * @property int $id_ensig
 * @property int $id_module
 * @property string $description
 */
class Ensignentmodule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ensignentmodule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_ensig', 'id_module'], 'required'],
            [['id_ensig', 'id_module'], 'integer'],
            [['description'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_ensig' => 'Ensignent',
            'id_module' => 'Module',
            'description' => 'Description',
        ];
    }

    /**
     * get teacher associated with module
     *
     */
    public function getEnsignent(){
        return $this->hasOne(Ensignent::className(),['id'=>'id_ensig']);
    }

    /**
     * get the module associated with teacher
     */
    public function getModule(){
        return $this->hasOne(Module::className(),['id'=>'id_module']);
    }
}
