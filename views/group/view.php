<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $model app\models\Group */

$this->title = $model->titre;
$this->params['breadcrumbs'][] = ['label' => 'Groupes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-view">

    <h1><?= Html::encode($this->title) ?></h1>


<!--    //this table display all the programme for the current group-->
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Module</th>
            <th>nombre des heurs</th>
        </tr>
        </thead>
        <?php foreach ($model->groupemodule as $item): ?>
            <tr>
                <th>
                    <?= Html::encode($item->module->titre) ?>
                </th>
                <th>
                    <?= Html::encode($item->nbre) ?>
                </th>
            </tr>
        <?php endforeach; ?>
        <tbody>
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
            'titre:ntext',
            'filiere:ntext',
            'nombre',
            'description:ntext',
        ],
    ]) ?>




</div>
