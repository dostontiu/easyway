<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\helpers\Url;

/* @var $regions common\models\Region */
/* @var $groups common\models\Group */
/* @var $pilgrim_types common\models\PilgrimType */
/* @var $pilgrims common\models\Pilgrim */
/* @var $mahram_names common\models\MahramName */
/* @var $marital_statuses array */
?>

<script type="text/x-template" id="pilgrim-vue-form">
<div class="">
    <div class="row">
        <div class="col-md-4">
            <label for="">Reys</label>
            <select class="form-control">
                <option >1-reys</option>
                <option >2-reys</option>
                <option >3-reys</option>
                <option >4-reys</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="">Region</label>
            <select class="form-control" v-model="pilgrim.region_id">
                <option v-for="region in regions" v-bind:value="region.id">{{ region.name }}</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="">Group</label>
            <select class="form-control" v-model="pilgrim.group_id">
                <option v-for="group in groups" v-bind:value="group.id">{{ group.name }}</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="">Pilgrim type</label>
            <select class="form-control" v-model="pilgrim.pilgrim_type_id">
                <option v-for="pilgrim_type in pilgrim_types" v-bind:value="pilgrim_type.id">{{ pilgrim_type.name }}</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="">Marital status</label>
            <select class="form-control" v-model="pilgrim.marital_status">
                <option v-for="(item, key) in marital_statuses" v-bind:value="key">{{ item }}</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="">Mahram</label>
            <select class="form-control" v-model="pilgrim.mahram_id">
                <option v-for="(item, key) in mahram_pilgrims" v-bind:value="key">{{ item }}</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="">Form</label>
            <textarea class="form-control" rows="3" v-model="pilgrim.p_mrz"></textarea>
        </div>
        <div class="col-md-1">
            <br>
            <br>
            <button class="btn btn-success btn-lg p-l-20 p-r-20" type="button" @click="save()"><i class="fa fa-plus"></i></button>
        </div>
        <div class="col-md-1">
            <br>
            <label for="autosave">Auto save</label><br>
            <input name="autosave" type="checkbox" checked="" class="js-switch" data-color="#13dafe" style="display: none;" data-switchery="true">
            <span class="switchery switchery-default" style="background-color: rgb(19, 218, 254); border-color: rgb(19, 218, 254); box-shadow: rgb(19, 218, 254) 0px 0px 0px 16px inset; transition: border 0.4s ease 0s, box-shadow 0.4s ease 0s, background-color 1.2s ease 0s;"><small style="left: 20px; transition: background-color 0.4s ease 0s, left 0.2s ease 0s; background-color: rgb(255, 255, 255);"></small></span>
        </div>
        <div class="col-md-4">
            <label for="">Mahram name</label>
            <select class="form-control" v-model="pilgrim.mahram_name_id">
                <option v-for="mahram_name in mahram_names" v-bind:value="mahram_name.id">{{ mahram_name.name }}</option>
            </select>
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
                countries: <?= Json::encode($countries)?>,
                marital_statuses: <?= Json::encode($marital_statuses)?>,
                validateErrMsg: '',
                pilgrim: { // 20 ta
                    region_id: '',
                    group_id: '',
                    pilgrim_type_id: 1,
                    mahram_name_id: '',
                    mahram_id: null,
                    marital_status: 1,
                    p_mrz: 'P<UZBISMAILOV<<DASTON<<<<<<<<<<<<<<<<<<<<<<<\n' +
                        'KA07413416UZB9503146M26020953140395346004466\n',
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
                    personal_number: '',
                    status: 1,
                    user_id: <?= Yii::$app->user->id?>,
                },
            }
        },
        methods: {
            save: function(){
                let document = new MRZ.Document(this.pilgrim.p_mrz).parse();

                let parents = this.$parent.pilgrims;
                if (this.validate(document)){
                    axios.post('<?= Url::to(['add']) ?>', {
                        Pilgrim: this.pilgrim
                    })
                        .then(function (response) {
                            if (response.data.success === true){
                                parents.push(response.data.model);
                                alert('Added successfully!');
                            } else {
                                alert('Error');
                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                } else {
                    console.log(this.validateErrMsg);
                    alert('not sent')
                }
            },
            validate: function(document){
                let valid = true;
                let errMsg = 'Err: ';
                let onlyLetters = /^[A-Za-z]+$/;
                let onlyNumbers = /^[0-9]+$/;

                this.pilgrim.first_name = document.first_name;
                this.pilgrim.last_name = document.last_name;
                this.pilgrim.middle_name = document.second_last_name;
                this.pilgrim.birth_date = document.birth_date;
                this.pilgrim.gender = document.gender;
                this.pilgrim.p_number = document.document_number;
                this.pilgrim.p_expiry_date = document.document_expiry;
                this.pilgrim.p_type = document.document_type;
                this.pilgrim.personal_number = document.personal_number;
                this.pilgrim.p_issue_date = this.get_issue_date(document); // @todo

                if (document.valid){
                    if (!document.valid.document_number){
                        errMsg = errMsg.concat('False "document_number"\n');
                        valid = false;
                    }
                    if (!document.valid.document_expiry){
                        errMsg = errMsg.concat('False "document_expiry"\n');
                        valid = false;
                    }
                    if (!document.valid.birth_date){
                        errMsg = errMsg.concat('False "birth_date"\n');
                        valid = false;
                    }
                    if (!document.valid.composite){
                        errMsg = errMsg.concat('False "composite"\n');
                        valid = false;
                    }
                    if (!document.valid.personal_number){
                        errMsg = errMsg.concat('False "personal_number"\n');
                        valid = false;
                    }
                    if (!document.valid.document_valid){
                        errMsg = errMsg.concat('False "document_valid"\n');
                        valid = false;
                    }
                } else {
                    this.validateErrMsg = "Noto'g'ri o'qitildi!";
                    return false;
                }

                if (!document.first_name || !onlyLetters.test(document.first_name)){
                    errMsg = errMsg.concat('Ismda alfabet harflaridan boshqa belgilar bor\n');
                    valid = false;
                }
                if (!document.last_name || !onlyLetters.test(document.last_name)){
                    errMsg = errMsg.concat('Familiyada alfabet harflaridan boshqa belgilar bor\n');
                    valid = false;
                }
                if (!document.personal_number || !onlyNumbers.test(document.personal_number)){
                    errMsg = errMsg.concat('Personal nomerda faqat raqamlar qatnashishi kerak\n');
                    valid = false;
                }

                if (!this.pilgrim.region_id){
                    errMsg = errMsg.concat('Region ni tanlang\n');
                    valid = false;
                }
                if (!this.pilgrim.group_id){
                    errMsg = errMsg.concat('Group ni tanlang\n');
                    valid = false;
                }
                if (!this.pilgrim.pilgrim_type_id){
                    errMsg = errMsg.concat('Pilgrim type ni tanlang\n');
                    valid = false;
                }
                if (!this.pilgrim.marital_status){
                    errMsg = errMsg.concat('marital_status ni tanlang\n');
                    valid = false;
                }
                if (!this.pilgrim.status){
                    errMsg = errMsg.concat('status ni tanlang\n');
                    valid = false;
                }
                if (!this.pilgrim.p_mrz){
                    errMsg = errMsg.concat('p_mrz ni tanlang\n');
                    valid = false;
                }
                if (!this.pilgrim.mahram_name_id){
                    errMsg = errMsg.concat('Mahram name ni tanlang\n');
                    valid = false;
                }
                if (!this.pilgrim.mahram_id){
                    errMsg = errMsg.concat('mahram_id ni tanlang\n');
                    valid = false;
                }
                if (!this.get_nationality_id(document.nationality)){
                    errMsg = document.nationality + ' country doesn\'t found\n';
                    valid = false;
                }

                this.validateErrMsg = errMsg;
                return valid;
            },
            get_issue_date: function(document){
                let expiry_date = new Date(document.document_expiry);
                let year = expiry_date.getFullYear();
                let month = expiry_date.getMonth();
                let day = expiry_date.getDate();
                let p_issue_date = new Date(year - 10, month, day + 1);
                if (document.document_issue){
                    return document.document_issue;
                } else {
                    return p_issue_date.toLocaleDateString();
                }
            },
            get_nationality_id: function (nationality) {
                let valid = false;
                for (let i = 0; i < this.countries.length; i++){
                    if (this.countries[i].code === nationality){
                        this.pilgrim.nationality_id = this.countries[i].id;
                        valid = true;
                    }
                }
                return valid;
            },
        },
        mounted(){

        },
        watch:{

            // 'region_id':{
            //     handler(newValue,oldValue){
            //         // debugger
            //
            //     }
            // }

        }
    });
</script>
