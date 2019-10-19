<?php

use kartik\date\DatePicker;
use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Account */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="account-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-8 col-sm-6">
            <div class="col-md-4 col-sm-12">
                <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4 col-sm-12">
                <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4 col-sm-12">
                <?= $form->field($model, 'father_name')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-md-4">
                <?= $form->field($model, 'date_birth')->widget(DatePicker::className(), [
                    'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'yyyy-mm-dd'
                    ]
                ]); ?>
            </div>
            <div class="col-md-4 col-sm-12">
                <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-md-4 col-sm-12">
                <?= $form->field($model, 'telephone')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6 col-sm-12">
                <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6 col-sm-12">
                <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord? Yii::t('app', 'Save') : Yii::t('app', 'Update'), ['class' => 'btn btn-block btn-outline btn-rounded btn-primary']) ?>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <?= $form->field($model, 'file')->widget(FileInput::classname(), [
                'options' => ['accept' => 'image/*'],
                'pluginOptions'=>[
                    'allowedFileExtensions'=>['jpg','gif','png'],
                    'showUpload' => false,
                    'initialPreview' => [
                        ($model->image) ? Yii::$app->homeUrl.'images/profile/'.$model->image : null,
                    ],
                    'initialPreviewAsData' => ($model->image) ? true : false,
                    'initialCaption' => ($model->image) ? $model->image : false,
                ],
            ]); ?>
        </div>
    </div>



    <?php ActiveForm::end(); ?>

</div>
