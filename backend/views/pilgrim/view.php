<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Pilgrim */
?>
<div class="pilgrim-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'first_name',
            'last_name',
            'middle_name',
            'birth_date',
            'gender',
            'p_number',
            'p_issue_date',
            'p_expiry_date',
            'p_type',
            'p_mrz',
            'nationality_id',
            'region_id',
            'marital_status',
            'mahram_id',
            'mahram_name_id',
            'group_id',
            'status',
            'pilgrim_type_id',
            'personal_number',
            'user_id',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
