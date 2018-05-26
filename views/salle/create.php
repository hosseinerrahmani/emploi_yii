<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Salle */

$this->title = 'Ajouter Salle';
$this->params['breadcrumbs'][] = ['label' => 'Salles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salle-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
