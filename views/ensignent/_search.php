<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EnsignentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ensignent-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>


    <?= $form->field($model, 'nom') ?>

    <?= $form->field($model, 'prenom') ?>

    <?= $form->field($model, 'date_naissance') ?>

    <div class="form-group">
        <?= Html::submitButton('Rechercher', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Réinitialiser', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
