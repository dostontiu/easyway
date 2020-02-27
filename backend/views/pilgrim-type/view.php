<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PilgrimType */
?>
<div class="pilgrim-type-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'description',
            'role',
        ],
    ]) ?>

</div>
