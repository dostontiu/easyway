<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PilgrimType */

$this->title = Yii::t('app', 'Create Pilgrim Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pilgrim Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pilgrim-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
