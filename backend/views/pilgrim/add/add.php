<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$count = 0;
?>

<div class="malumot-add">
    <div class="row">
        <div class="col-md-7">
            <div class="row">
                <?= $this->render('_group') ?>
                <?php $count_people = 12 ?>
            </div>
            <div class="row">
                <?php $form = ActiveForm::begin(); ?>
                <div class="col-md-10">
<!--                        --><?php // $form->field($model, 'read')->textarea(['rows' => 4]) ?>
                    <textarea  name="downloadSourceCode" class="form-control" rows="4"></textarea>
                </div>
                <div class="col-md-2">
                    <br>
                    <br>
                    <?= Html::submitButton('Saqlash', ['class' => 'btn saqlash btn-primary btn-block']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
            <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center">Oxirgi kiritilgan ziyoratchi haqida ma'lumot</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-7">
                                <ul class="list-group text-success">
                                    <li class="list-group-item">Familiyasi : <b>surname</b></li>
                                    <li class="list-group-item">Ismi : <b>name</b></li>
                                    <li class="list-group-item">Pasport raqami : <b>p_number</b></li>
                                    <li class="list-group-item">Tug'ilgan kuni : <b>22.12.1997</b></li>
                                    <li class="list-group-item">Pasport berilgan vaqti : <b>16.02.2019</b></li>
                                    <li class="list-group-item">Pasport tugash muddati : <b>16.02.2019</b></li>
                                    <li class="list-group-item">Qachon kiritilganligi : <b>16.02.2019</b></li>
                                    <li class="list-group-item">Kim kiritganligi : <i>Ismailov D</i></li>
                                    <li class="list-group-item"><b class="glyphicon glyphicon-triangle-bottom"></b></li>
                                </ul>
                            </div>
                            <div class="col-md-5">
                                <div class="panel panel-info">
                                <?php //(file_exists("img/inch/{$findOne['p_number']}.jpg"))?Html::img("/img/inch/{$findOne['p_number']}.jpg",['style'=>'max-width:180px',]):Html::img("/img/dump/nophoto.png",['style'=>'max-width:220px',]);?>
                                    <input name="img" style="float: left" class="" type="file" id="img">
                                </div>
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <select name="mahram_name_id" class="form-control">
                                                <option value="<?=null?>">Mahram</option>

                                            </select>
                                        </div>
                                        <div class="col-xs-7">
                                            <select name="mahram_id" class="form-control">
                                                <option value="<?=null?>">Mahram kimligi</option>

                                            </select>
                                        </div>
                                    </div>
                                <select name="function_id" class="form-control">

                                </select>
                                <textarea name="address" class="form-control" placeholder="Yashash joyi haqida ma'lumot" rows="3"></textarea>
                                <div class="row">
                                    <div class="col-xs-7">
                                        <input name="tel_number" type="text" class="form-control" id="tel" value="" placeholder="Telefon raqami">
                                    </div>
                                    <div class="col-xs-5">
                                        <?= Html::submitButton('Tahrirlash', ['class' => 'btn btn-info btn-block']) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="col-md-5">
            <ul class="list-group">
                <li class="list-group-item list-group-item-success"><span class="badge"><?=$count_people?></span>Guruhdagi ziyoratchilarning umumiy soni</li>
                <li class="list-group-item list-group-item-info"><span class="badge"><?=$count?></span>Hozirda guruhdagi ziyoratchilar soni</li>
                <li class="list-group-item list-group-item-danger"><span class="badge"><?=$count_people-$count?></span>Guruhga yana kiritish kerak</li>
            </ul>
            <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: <?=$count/$count_people*100?>%">
                    <div class="speed text-danger" title="Guruhga <?=$count?> ta ziyoratchi kirgan" ><?=$count?></div>
                </div>
                <div class="speed text-success" title="Guruhga yana <?=$count_people-$count?> ta ziyoratchi kiritilishi kerak"><?=$count_people-$count?></div>
            </div>
            <?= $this->render('_right') ?>
        </div>
    </div>
</div>