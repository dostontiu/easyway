<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Region */
?>
<div class="region-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'code',
            'zip_code',
            'country_id',
            'lat',
            'lon',
        ],
    ]) ?>

</div>
