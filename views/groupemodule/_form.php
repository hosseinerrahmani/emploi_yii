<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Groupemodule */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="groupemodule-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_group')
        ->dropDownList(ArrayHelper::map(\app\models\Group::find()->all(),'id','titre'))
         ?>

    <?= $form->field($model, 'id_module')
        ->dropDownList(ArrayHelper::map(\app\models\Module::find()->all(),'id','titre'))
        ?>
    <?= $form->field($model, 'nbre')->textInput() ?>

    <?= $form->field($model, 'descrption')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Enregistrer', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
