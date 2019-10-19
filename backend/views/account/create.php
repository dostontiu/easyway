<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Account */

$this->title = Yii::t('app', 'Create Account');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Accounts'), 'url' => ['index'], 'style'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
