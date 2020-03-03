<?php

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
            <label for="">Mahram name</label>
            <select class="form-control" v-model="mahram_name_id">
                <option v-for="mahram_name in mahram_names" v-bind:value="mahram_name.id">{{ mahram_name.name }}</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="">Marital status</label>
            <input type="text" class="form-control" v-model="marital_status">
        </div>
        <div class="col-md-4">
            <label for="">Mahram id</label>
            <input type="text" class="form-control" v-model="mahram_id">
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
                id: 0,
                name: 'name',
                regions: <?= Json::encode($regions)?>,
                groups: <?= Json::encode($groups)?>,
                pilgrim_types: <?= Json::encode($pilgrim_types)?>,
                mahram_names: <?= Json::encode($mahram_names)?>,
                region_id: '',
                group_id: '',
                pilgrim_type_id: '',
                mahram_name_id: '',
                mahram_id: '',
                marital_status: '',
            }
        }
    });
</script>
