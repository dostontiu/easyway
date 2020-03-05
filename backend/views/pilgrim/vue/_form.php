<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Json;

?>

<script type="text/x-template" id="pilgrim-vue-form">
<div class="">
    <div class="row">
        <div class="col-md-4">
            <label for="">Region</label>
            <select class="form-control" v-model="region_id">
                <option v-for="region in regions" v-bind:value="region.id">{{ region.name }}</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="">Group</label>
            <select class="form-control" v-model="group_id">
                <option v-for="group in groups" v-bind:value="group.id">{{ group.name }}</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="">Pilgrim type</label>
            <select class="form-control" v-model="pilgrim_type_id">
                <option v-for="pilgrim_type in pilgrim_types" v-bind:value="pilgrim_type.id">{{ pilgrim_type.name }}</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="">Marital status</label>
            <select class="form-control" v-model="marital_status">
                <option v-for="(item, key) in marital_statuses" v-bind:value="key">{{ item }}</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="">Mahram</label>
            <select class="form-control" v-model="mahram_id">
                <option v-for="(item, key) in mahram_pilgrims" v-bind:value="key">{{ item }}</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="">Mahram name</label>
            <select class="form-control" v-model="mahram_name_id">
                <option v-for="mahram_name in mahram_names" v-bind:value="mahram_name.id">{{ mahram_name.name }}</option>
            </select>
        </div>
        <div class="col-md-8">
            <label for="">Form</label>
            <textarea class="form-control" rows="5" v-model="p_mrz"></textarea>
        </div>
        <div class="col-md-4">
            <br>
            <br>
            <br>
            <button class="btn btn-success btn-lg p-l-20 p-r-20" type="button" @click="save()"><i class="fa fa-plus"></i></button>
        </div>
    </div>
</div>
</script>

<script type="text/javascript">
    var pilgrim_form = Vue.component('pilgrim-vue-form', {
        template: '#pilgrim-vue-form',
        props: {
            type: Number,
        },
        data: function () {
            return {
                regions: <?= Json::encode($regions)?>,
                groups: <?= Json::encode($groups)?>,
                pilgrim_types: <?= Json::encode($pilgrim_types)?>,
                mahram_pilgrims : <?= Json::encode(ArrayHelper::map($pilgrims, 'id', 'first_name'))?>,
                mahram_names: <?= Json::encode($mahram_names)?>,
                marital_statuses: <?= Json::encode($marital_statuses)?>,
                region_id: '',
                group_id: '',
                pilgrim_type_id: 1,
                mahram_name_id: '',
                mahram_id: null,
                marital_status: 1,
                p_mrz: 'P<UZBISMAILOV<<DASTON<<<<<<<<<<<<<<<<<<<<<<<\n' +
                    'KA07413416UZB9503146M26020953140395346004466\n',
                validateErrMsg: '',
                first_name: '',
                last_name: '',
                middle_name: '',
                birth_date: '',
                gender: '',
                p_number: '',
                p_issue_date: '',
                p_expiry_date: '',
                p_type: '',
                nationality_id: '',
                status: 1,
                personal_number: '',
                user_id: <?= Yii::$app->user->id?>,
            }
        },
        methods: {
            save: function(){
                // alert(this.region_id)
                var document = new MRZ.Document(this.p_mrz).parse();
                var valid = this.validate(document);
                console.log(document);
            },
            validate: function(document){
                this.first_name = document.first_name;
                this.last_name = document.last_name;
                this.middle_name = document.second_last_name;
                this.birth_date = document.birth_date;
                this.gender = document.gender;
                this.p_number = document.document_number;
                this.p_expiry_date = document.document_expiry;
                this.p_type = document.document_type;
                this.personal_number = document.personal_number;
                this.nationality_id = document.nationality; // @todo
                this.p_issue_date = this.get_issue_date(document); // @todo
            },
            get_issue_date: function(document){
                let expirydate = new Date(document.document_expiry);
                let year = expirydate.getFullYear();
                let month = expirydate.getMonth();
                let day = expirydate.getDate();
                let p_issue_date = new Date(year - 10, month, day + 1);
                if (document.document_issue){
                    return document.document_issue;
                } else {
                    return p_issue_date.toLocaleDateString();
                }
            },
        },
        mounted(){

        },
        watch:{

            'region_id':{
                handler(newValue,oldValue){
                    // debugger

                }
            }

        }
    });
</script>
