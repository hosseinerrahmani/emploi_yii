<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Salle */

$this->title = 'Modifier Salle: ' . $model->titre;
$this->params['breadcrumbs'][] = ['label' => 'Salles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Modifier';
?>
<div class="salle-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
