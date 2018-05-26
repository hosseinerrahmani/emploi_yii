<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Ensignent */

$this->title = 'Ajouter Enseignant';
$this->params['breadcrumbs'][] = ['label' => 'Ensignents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ensignent-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
