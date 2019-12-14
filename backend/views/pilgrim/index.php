<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\PilgrimSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Pilgrims');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pilgrim-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Pilgrim'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'first_name',
            'last_name',
            'middle_name',
            'birth_date',
            //'gender',
            //'p_number',
            //'p_issue_date',
            //'p_expiry_date',
            //'p_type',
            //'p_mrz',
            //'nationality_id',
            //'region_id',
            //'marital_status',
            //'mahram_id',
            //'mahram_name_id',
            //'group_id',
            //'status',
            //'pilgrim_type_id',
            //'personal_number',
            //'user_id',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
