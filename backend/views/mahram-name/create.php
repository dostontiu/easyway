<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MahramName */

$this->title = Yii::t('app', 'Create Mahram Name');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mahram Names'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mahram-name-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
