<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "groupemodule".
 *
 * @property int $id
 * @property int $id_group
 * @property int $id_module
 * @property int $nbre
 * @property string $descrption
 */
class Groupemodule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'groupemodule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_group', 'id_module', 'nbre', 'descrption'], 'required'],
            [['id_group', 'id_module', 'nbre'], 'integer'],
            [['descrption'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_group' => 'Groupe ',
            'id_module' => 'Module',
            'nbre' => 'Nombre de séance',
            'descrption' => 'Information sur le programme',
        ];
    }

    /**
     * get teacher associated with module
     *
     */
    public function getGroup(){
        return $this->hasOne(Group::className(),['id'=>'id_group']);
    }

    /**
     * get the module associated with teacher
     */
    public function getModule(){
        return $this->hasOne(Module::className(),['id'=>'id_module']);
    }
}
