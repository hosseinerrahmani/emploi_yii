<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Ensignentmodule */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ensignentmodule-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_ensig')
            ->dropDownList(ArrayHelper::map(\app\models\Ensignent::find()->all(),'id','nom'))
           ->label("Ensignent") ?>

    <?= $form->field($model, 'id_module')
            ->dropDownList(ArrayHelper::map(\app\models\Module::find()->all(),'id','titre'))
           ->label("Module") ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6])?>

    <div class="form-group">
        <?= Html::submitButton('Enregistrer', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
