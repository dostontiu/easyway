<?php

use yii\helpers\Json;
use yii\web\View;

$this->registerJsFile(Yii::getAlias('@web') . '/js/vue.js', ['position' => View::POS_HEAD]);

require_once '_form.php';

?>

<div id="pilgrim-vue-index">
    <div class="row">
        <div class="col-md-8">
            formalar
            <pilgrim-vue-form></pilgrim-vue-form>
        </div>
        <div class="col-md-4">
            royhat
            <!-- {{pilgrims}} -->
            <table class="table table-bordered table-sm table-hover table-p-0">
                <thead>
                <tr>
                    <th>#</td>
                    <th>Ism</th>
                    <th>Familiya</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(pilgrim, i) in pilgrims">
                    <td>{{i+1}}</td>
                    <td>{{pilgrim.first_name}}</td>
                    <td>fd</td>
                    <td>
                        <button class="btn btn-danger btn-sm" type="button" @click="removeReceipt(receipt, i)"><i class="fa fa-remove"></i></button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    var sup_root = new Vue({
        el: '#pilgrim-vue-index',
        data: {
            pilgrims : <?= Json::encode($pilgrims)?>
        },
    });
</script>
