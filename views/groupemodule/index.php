<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GroupemoduleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Programmer votre seance';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="groupemodule-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Ajouter', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'id_group',
                'value' => 'group.titre',//here we need to use relation here
            ],

            [
                'attribute' => 'id_module',
                'value' => 'module.titre'
            ],
            'nbre',
            'descrption:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
