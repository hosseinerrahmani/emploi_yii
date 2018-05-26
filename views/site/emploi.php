<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Emploi de temps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <?php foreach ($model['hour'] as $item) : ?>
                <th><?= Html::encode($item) ?></th>

            <?php endforeach; ?>
        </tr>
        </thead>
        <tbody>
        <?php $i = 0 ?>
        <?php foreach ($model['programe'] as $emploi) {
            ?>
            <tr>
                <th>
                    <?= Html::encode($model['days'][$i]) ?>
                </th>
                <?php foreach ($emploi as $day): ?>

                    <th>
                        <?php foreach ($day as $hour) : ?>
                            <div class="well">
                                <?php foreach ($hour as $item): ?>
                                    <?= Html::encode($item) ?>
                                <?php endforeach; ?>
                            </div>
                        <?php endforeach; ?>
                    </th>
                <?php endforeach; ?>

            </tr>
            <?php
            $i++;
        } ?>
        <th>
        </tbody>
    </table>