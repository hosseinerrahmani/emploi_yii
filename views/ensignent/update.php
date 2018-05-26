<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ensignent */

$this->title = 'Modifier : ' . $model->nom;
$this->params['breadcrumbs'][] = ['label' => 'Ensignents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nom, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Modifier';
?>
<div class="ensignent-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
