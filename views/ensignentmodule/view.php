<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ensignentmodule */

$this->title = "Associer Ensignent avec module";
$this->params['breadcrumbs'][] = ['label' => 'Association', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ensignentmodule-view">

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
    <?php
    $model->ensignent->nom;
    ?>
    <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                array(
                    'attribute' => 'id_module',
                    'value' => $model->module->titre,
                ),
                array(
                    'attribute' => 'id_ensig',
                    'value' => $model->ensignent->nom.' '.$model->ensignent->prenom,
                ),

                'description:ntext',
            ]
        ]
    ) ?>

</div>
