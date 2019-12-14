<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Airport */

$this->title = Yii::t('app', 'Create Airport');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Airports'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="airport-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
