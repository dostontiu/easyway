<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>

<?php
$model = new \common\models\PilgrimType();
$form = ActiveForm::begin([
    'action' => ['pilgrim/ajax-comment'],
    'options' => [
        'class' => 'comment-form'
    ]
]);
?>
<?//= $form->field($model, 'name'); ?>
<?//= $form->field($model, 'description'); ?>

<?//= Html::submitButton("Submit", ['class' => "btn"]); ?>

<?php ActiveForm::end(); ?>


<?php $form = ActiveForm::begin(['id' => 'group', 'action' => ['change-group']]); ?>
<div class="col-md-3 col-sm-6">
    <select name="" class="form-control">
        <option>1 - Reys</option>
        <option>2 - Reys</option>
        <option>3 - Reys</option>
    </select>
</div>
<div class="col-md-3 col-sm-6">
    <select name="reys" class="form-control">
        <option>Region</option>
        <option>Tashkent</option>
        <option>Andijan</option>
    </select>
</div>
<div class="col-md-4 col-sm-6">
    <select name="id" class="form-control">
        <option value="1"> Group</option>
        <option value="1"> Tashkent-1</option>
        <option value="1"> Tashkent-2</option>
    </select>
</div>
<div class="col-md-2 col-sm-6">
    <?= Html::submitButton('O\'zgartirish', ['class' => 'btn btn-primary btn-block btn-sm']) ?>
    <?php $count_people = 12 ?>
</div>
<?php ActiveForm::end(); ?>

<?php
$this->registerJs(<<<JS
$(".comment-form").submit(function(event) {
            event.preventDefault(); // stopping submitting
            var data = $(this).serializeArray();
            var url = $(this).attr('action');
            // console.log(data);
            // console.log(url);
            // $.ajax({
            //     url: url,
            //     type: 'post',
            //     dataType: 'json',
            //     data: data
            // })
            // .success(function(response) {
            //     if (response.data.success === true) {
            //         alert("Wow you commented");
            //     }
            // })
            // .fail(function() {
            //     console.log("error");
            // });
            
            $.ajax({
                    url:url,
                    type: 'POST',
                    data:data,
                    success: function(response) {
                        if(response == 1){
                            alert("Wow you commented");
                        }else{
                            alert("nooooo");
                        }

                    }
                })

        
        });
JS
);
?>

