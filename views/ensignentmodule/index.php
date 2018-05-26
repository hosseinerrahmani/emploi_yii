<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EnsignentmoduleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Associer Ensignent avec module';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ensignentmodule-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Ajouter', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
          //  ['class' => 'yii\grid\SerialColumn'],

            [
                    'attribute'=>'id_ensig',
                    'value'=>'ensignent.nom',//here we need to use relation here
            ],

            [
                    'attribute'=>'id_module',
                    'value'=>'module.titre'
            ],
                        'description:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
