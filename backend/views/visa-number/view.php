<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\VisaNumber */
?>
<div class="visa-number-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'p_number',
            'visa',
            'created_at',
        ],
    ]) ?>

</div>
