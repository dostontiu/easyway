<?php

/* @var $this yii\web\View */
/* @var $model common\models\Pilgrim */

use yii\helpers\Html; ?>

<div class="row">
    <div class="col-md-5">
        <?= Html::img($model->imageUrl, ['class' => 'img-thumbnail']) ?>
    </div>
    <div class="col-md-7" style="padding: 10px 10px 10px 0;">
        <?= $model->fullName ?>
    </div>
</div>
