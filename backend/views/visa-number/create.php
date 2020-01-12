<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\VisaNumber */

$this->title = Yii::t('app', 'Create Visa Number');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Visa Numbers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visa-number-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
