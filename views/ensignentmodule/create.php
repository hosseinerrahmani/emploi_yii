<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Ensignentmodule */

$this->title = 'Associer Ensignent avec module';
$this->params['breadcrumbs'][] = ['label' => 'Ensignentmodules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ensignentmodule-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
