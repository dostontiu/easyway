<?php

use yii\helpers\Json;
use yii\web\View;
use yii\helpers\Url;

$this->registerJsFile(Yii::getAlias('@web') . '/js/vue.js', ['position' => View::POS_HEAD]);
$this->registerJsFile(Yii::getAlias('@web') . '/js/mrz-reader.js', ['position' => View::POS_HEAD]);
$this->registerJsFile(Yii::getAlias('@web') . '/js/axios.min.js', ['position' => View::POS_HEAD]);
$this->registerJsFile(Yii::getAlias('@web') . '/plugins/components/switchery/dist/switchery.min.js', ['position' => View::POS_HEAD]);
$this->registerCssFile(Yii::getAlias('@web') . '/plugins/components/switchery/dist/switchery.min.css', ['position' => View::POS_HEAD]);

require_once '_form.php';

/* @var $pilgrims common\models\Pilgrim */
?>

<div id="pilgrim-vue-index">
    <div class="row">
        <div class="col-md-8">
            <pilgrim-vue-form></pilgrim-vue-form>
        </div>
        <div class="col-md-4">
            <table class="table table-bordered table-hover">
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
                    <td>{{pilgrim.last_name}}</td>
                    <td>
                        <button class="btn btn-danger btn-sm" type="button" @click="remove(pilgrim.id, i)"><i class="fa fa-remove"></i></button>
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
        methods: {
            remove: function (id, i) {
                let pilgrims = this.pilgrims;
                if (confirm("Ishonchigiz komilmi?")){
                    axios.post('<?= Url::to(['remove-pilgrim']) ?>', {
                        id: id
                    })
                        .then(function (response) {
                            if (response.data == true){
                                pilgrims.splice(i, 1); // Removed successfully
                            } else {
                                console.log(response);
                                alert('Error1');
                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                            alert('Error2');
                        });
                }
            }
        }
    });
</script>
