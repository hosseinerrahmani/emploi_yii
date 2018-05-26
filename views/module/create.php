<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Module */

$this->title = 'Ajouter Module';
$this->params['breadcrumbs'][] = ['label' => 'Modules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="module-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
