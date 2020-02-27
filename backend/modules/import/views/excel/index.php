<?php

use yii\helpers\Html;
use \yii\widgets\ActiveForm;

/* @var $this yii\web\View */

$this->title = 'Import excel';
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['index']];
$noImages = [];
?>
<div class="excel-index">
    <div class="row">
        <div class="col-md-10">
            <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']])?>

            <?= $form->field($model, 'file')->fileInput()?>

            <?= Html::submitButton('Upload', ['class' => 'btn btn-success']) ?>

            <?php ActiveForm::end()?>
            <?php if (!empty($data)) :?>
                <h2 class="text-center">
                    Jadval
                    <button class="btn btn-info" onclick="window.open('bejik?name=<?=$name?>', 'newwindow', 'width=1000,height=850');  return false;" target="_blank">Bejik <i class="fa fa-print"></i></button>
                </h2>
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>T/R</th>
                        <th>Familiya</th>
                        <th>Ism</th>
                        <th>Passport</th>
                        <th>Guruh</th>
                        <th>Rasm</th>
                    </tr>
                    <?php foreach ($data as $item) {
                        $file = Yii::$app->basePath . '/web/inch/'.$item[0][3].'.jpg';
                        if (file_exists($file)){
                            $bgClass = '';
                        } else {
                            $noImages[] = $item[0][3];
                            $bgClass = 'bg-warning';
                        }
                        echo '<tr class="'.$bgClass.'">';
                        echo '<td>'. $item[0][0] .'</td>';
                        echo '<td>'. $item[0][1] .'</td>';
                        echo '<td>'. $item[0][2] .'</td>';
                        echo '<td>'. $item[0][3] .'</td>';
                        echo '<td>'. $item[0][4] .'</td>';
                        echo '<td class="image-one-td">'.Html::img(Yii::$app->homeUrl.'inch/'.$item[0][3].'.jpg', ['class' => 'image-one']).'</td>';
                        echo '</tr>';
                    }
                    ?>
                </table>

        </div>
        <div class="col md-2">
            <h2>Rasm <br>chiqmaganlar</h2>
            <?php
            foreach ($noImages as $noImage){
                echo '<p class="text-danger">'.$noImage.'</p>';
            }
            ?>
        </div>
        <?php endif;?>
    </div>

</div>
