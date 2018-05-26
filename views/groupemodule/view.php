<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Groupemodule */

$this->title = "Programme";
$this->params['breadcrumbs'][] = ['label' => 'Groupemodules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="groupemodule-view">

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
            array(
                'attribute' => 'id_group',
                'value' => $model->group->titre,
            ),
            array(
                'attribute' => 'id_module',
                'value' => $model->module->titre,
            ),
            'nbre',
            'descrption:ntext',
        ],
    ]) ?>

</div>
