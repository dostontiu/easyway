<?php

use common\models\Group;
use common\models\Pilgrim;
use common\models\PilgrimType;
use kartik\grid\GridView;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '10px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '40px',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'fullName',
        'format' => 'raw',
        'contentOptions' => ['style' => 'width:250px; padding: 0; margin:0'],
        'value' => function ($model) {
            return $this->render('_detail', ['model' => $model]);
        }
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'p_number',
    ],
    [
        'attribute' => 'birth_date',
        'format' => ['date', 'php:d.m.Y'],
        'vAlign' => 'middle',
        'filterType' => GridView::FILTER_DATE_RANGE,
        'filterWidgetOptions' => [
            'model' => $searchModel,
            'convertFormat' => true,
            'useWithAddon' => false,
            'options' => [
                'autocomplete' => 'off',
            ],
            'pluginOptions' => [
                'locale' => ['format' => 'd.m.Y'],
                'separator' => ' - ',
                'opens' => 'right',
                'language' => 'ru',
                'pluginEvents' => [
                    'cancel.daterangepicker' => "function(ev, picker) {\$('#daterangeinput').val(''); // clear any inputs};",
                    'format' => 'Y-m-d',
                    'opens' => 'left'
                ],
            ]
        ]
    ],
    [
        'attribute' => 'p_issue_date',
        'format' => ['date', 'php:d.m.Y'],
        'vAlign' => 'middle',
        'filterType' => GridView::FILTER_DATE_RANGE,
        'filterWidgetOptions' => [
            'model' => $searchModel,
            'convertFormat' => true,
            'useWithAddon' => false,
            'options' => [
                'autocomplete' => 'off',
            ],
            'pluginOptions' => [
                'locale' => ['format' => 'd.m.Y'],
                'separator' => ' - ',
                'opens' => 'right',
                'language' => 'ru',
                'pluginEvents' => [
                    'cancel.daterangepicker' => "function(ev, picker) {\$('#daterangeinput').val(''); // clear any inputs};",
                    'format' => 'Y-m-d',
                    'opens' => 'left'
                ],
            ]
        ]
    ],
    [
        'attribute' => 'p_expiry_date',
        'format' => ['date', 'php:d.m.Y'],
        'vAlign' => 'middle',
        'filterType' => GridView::FILTER_DATE_RANGE,
        'filterWidgetOptions' => [
            'model' => $searchModel,
            'convertFormat' => true,
            'useWithAddon' => false,
            'options' => [
                'autocomplete' => 'off',
            ],
            'pluginOptions' => [
                'locale' => ['format' => 'd.m.Y'],
                'separator' => ' - ',
                'opens' => 'right',
                'language' => 'ru',
                'pluginEvents' => [
                    'cancel.daterangepicker' => "function(ev, picker) {\$('#daterangeinput').val(''); // clear any inputs};",
                    'format' => 'Y-m-d',
                    'opens' => 'left'
                ],
            ]
        ]
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'gender',
        'value' => function($model) {
            if ($model->gender == 'M') return Yii::t('app', 'Male');
            if ($model->gender == 'F') return Yii::t('app', 'Female');
            return Yii::t('app', 'Other');
        },
        'filter' => ['M' => Yii::t('app', 'Male'), 'F' => Yii::t('app', 'Female')],
        'filterInputOptions' => ['prompt' => Yii::t('app', 'All'), 'class' => 'form-control'],
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'mahram_id',
        'format' => 'raw',
        'value' => function($model) {
            if ($model->mahram && $model->mahramName){
                return '<i>' . $model->mahram->first_name ." ". $model->mahramName->name . '</i>';
            }
            return null;
        },
        'filter' => ArrayHelper::map(Pilgrim::find()->asArray()->all(), 'id', 'first_name'),
        'filterType' => GridView::FILTER_SELECT2,
        'filterWidgetOptions' => [
                'size' => Select2::SIZE_MEDIUM,
                'options' => ['prompt' => Yii::t('app', 'All')],
                'pluginOptions' => ['allowClear' => true],
            ],
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'status',
        'value' => function($model) {
            return Pilgrim::pilgrim_statuses[$model->status] ?? null;
        },
        'filter' => Pilgrim::pilgrim_statuses,
        'filterInputOptions' => ['prompt' => Yii::t('app', 'All'), 'class' => 'form-control'],
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'pilgrim_type_id',
        'value' => 'pilgrimType.name',
        'filter' => ArrayHelper::map(PilgrimType::find()->asArray()->all(), 'id', 'name'),
        'filterInputOptions' => ['prompt' => Yii::t('app', 'All'), 'class' => 'form-control'],
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'group_id',
        'format' => 'raw',
        'value' => function($model) {
            return $model->group->flight->name. ' <i>' .$model->group->name. '</i>';
        },
        'filter' => ArrayHelper::map(Group::find()->asArray()->all(), 'id', 'name'),
        'filterInputOptions' => ['prompt' => Yii::t('app', 'All'), 'class' => 'form-control'],
    ],
    [
        'attribute' => 'created_at',
        'format' => ['date', 'php:d.m.Y H:m:s'],
//        'format' => 'dateTime',
        'vAlign' => 'middle',
        'filterType' => GridView::FILTER_DATE_RANGE,
        'filterWidgetOptions' => [
            'model' => $searchModel,
            'convertFormat' => true,
            'useWithAddon' => false,
            'options' => [
                'autocomplete' => 'off',
            ],

            'pluginOptions' => [
                'locale' => ['format' => 'd.m.Y'],
                'separator' => ' - ',
                'opens' => 'left',
                'language' => 'ru',
                'alwaysShowCalendars' => true,
                'ranges' => [
                    Yii::t('app', 'Today') => ["moment().startOf('day')", "moment().endOf('day')"],
                    Yii::t('app', 'Yesterday') => ["moment().startOf('day').subtract(1,'days')", "moment().endOf('day').subtract(1,'days')"],
                    Yii::t('app', 'Last {n} Days', ['n' => 7]) => ["moment().startOf('day').subtract(6, 'days')", "moment().endOf('day')"],
                    Yii::t('app', 'Last {n} Days', ['n' => 30]) => ["moment().startOf('day').subtract(29, 'days')", "moment().endOf('day')"],
                    Yii::t('app', 'This Month') => ["moment().startOf('month')", "moment().endOf('month')"],
                    Yii::t('app', 'Last Month') => ["moment().subtract(1, 'month').startOf('month')", "moment().subtract(1, 'month').endOf('month')"]
                ],
                'pluginEvents' => [
                    'cancel.daterangepicker' => "function(ev, picker) {\$('#daterangeinput').val(''); // clear any inputs};",
                    'format' => 'Y-m-d',
                    'opens' => 'left'
                ],
            ]
        ]
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign' => 'middle',
        'urlCreator' => function ($action, $model, $key, $index) {
            return Url::to([$action, 'id' => $key]);
        },
        'viewOptions' => ['role' => 'modal-remote', 'title' => 'View', 'data-toggle' => 'tooltip'],
        'updateOptions' => ['role' => 'modal-remote', 'title' => 'Update', 'data-toggle' => 'tooltip'],
        'deleteOptions' => ['role' => 'modal-remote', 'title' => 'Delete',
            'data-confirm' => false, 'data-method' => false,// for overide yii data api
            'data-request-method' => 'post',
            'data-toggle' => 'tooltip',
            'data-confirm-title' => 'Are you sure?',
            'data-confirm-message' => 'Are you sure want to delete this item'],
    ],

];   