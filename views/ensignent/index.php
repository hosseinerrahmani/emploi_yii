<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EnsignentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Enseignant';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ensignent-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Ajouter Enseignant', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nom',
            'prenom',
            'date_naissance',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
