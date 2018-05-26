<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EnsignentmoduleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ensignentmodule-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>


    <?= $form->field($model, 'id_ensig') ?>

    <?= $form->field($model, 'id_module') ?>

    <?= $form->field($model, 'description') ?>

    <div class="form-group">
        <?= Html::submitButton('Rechercher', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Réinitialiser', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
