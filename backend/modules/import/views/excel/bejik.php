<?php

use yii\helpers\Html;
use \yii\widgets\ActiveForm;

/* @var $this yii\web\View */

$this->title = 'Импортировать ExcelController';
//$this->params['breadcrumbs'][] = ['label' => 'V Protocols', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="excel-index container">
    <?php foreach ($data as $item) : ?>
        <div class="itemt">
            <div class="ism"><?= $item[0][0].' '.$item[0][1].'<br>'.$item[0][2]; ?></div>
            <div class="guruh"> <?= $item[0][4] ?></div>
            <div class="rasm">
                <?= Html::img(Yii::$app->homeUrl.'inch/'.$item[0][3].'.jpg')  ?>
            </div>
            <div class="pnumber"><?= $item[0][3] ?></div>
            <?php $for_reg = $item[0][4] ?>
            <div class="photo">
                <?= Html::img(Yii::$app->homeUrl.'images/bejik/bejik.jpg')  ?>
            </div>
        </div>
    <?php endforeach;?>
</div>

<script type="text/javascript">
    window.print();
</script>

