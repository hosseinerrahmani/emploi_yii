<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Salle */

$this->title = $model->titre;
$this->params['breadcrumbs'][] = ['label' => 'Salles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salle-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifier', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimer', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Êtes-vous sûr de bien vouloir supprimer cet élément?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'titre',
            'type',
            'description:ntext',
        ],
    ]) ?>

</div>
