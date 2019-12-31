<?php

use yii\helpers\Html;
use \yii\widgets\ActiveForm;

/* @var $this yii\web\View */

$this->title = 'Импортировать ExcelController';
//$this->params['breadcrumbs'][] = ['label' => 'V Protocols', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="excel-index container">

    <?php //pr($data);?>
    <?php if (!empty($data)) :?>
        <h2 class="text-center">Информация ниже не добовлена</h2>
        <table class="table table-bordered table-hover">
            <tr>
                <td>ID</td>
                <td>Title</td>
                <td>Gender</td>
                <td>Relation</td>
                <td>FirstName</td>
                <td>FatherName</td>
                <td>GrandFather</td>
                <td>FamilyName</td>
                <td>BirthDate</td>
                <td>PassportNo</td>
            </tr>
            <?php foreach ($data as $item) {
                echo '<tr>';
                    echo '<td>'. $item[0][0] .'</td>';
                    echo '<td>'. $item[0][1] .'</td>';
                    echo '<td>'. $item[0][11] .'</td>';
                    echo '<td>'. $item[0][16] .'</td>';
                    echo '<td>'. $item[0][2] .'</td>';
                    echo '<td>'. $item[0][3] .'</td>';
                    echo '<td>'. $item[0][4] .'</td>';
                    echo '<td>'. $item[0][5] .'</td>';
                    echo '<td>'. $item[0][14] .'</td>';
                    echo '<td>'. $item[0][17] .'</td>';
                echo '</tr>';
            }
            ?>
        </table>
    <?php endif;?>

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']])?>

    <?= $form->field($model, 'file')->fileInput()?>

    <?= Html::submitButton('Загрузить', ['class' => 'btn btn-success']) ?>

    <?php ActiveForm::end()?>

</div>
