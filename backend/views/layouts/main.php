<?php

/* @var $this \yii\web\View */

/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?php
if (Yii::$app->user->isGuest) {
    echo $this->render('login', ['content' => $content]);
} else {
    ?>
    <div class="preloader" style="display: none;">
        <div class="cssload-speeding-wheel"></div>
    </div>
<div id="wrapper">
    <?php
    echo $this->render('header');
    echo $this->render('left');
    echo $this->render('content', ['content' => $content]);
}
?>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
