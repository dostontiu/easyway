<?php

use mdm\admin\components\MenuHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Menu;

?>
<aside class="sidebar">
    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;">
        <div class="scroll-sidebar" style="overflow: hidden; width: auto; height: 100%;">
            <div class="user-profile">
                <div class="dropdown user-pro-body">
                    <div class="profile-image">
                        <?php
                        $profile_image = 'images/profile/profile_no_photo.jpg';
                        if (Yii::$app->user->identity->account && file_exists('images/profile/'.Yii::$app->user->identity->account->image)){
                            $profile_image = 'images/profile/'.Yii::$app->user->identity->account->image;
                        }
                        ?>
                        <img src="<?= Yii::$app->homeUrl.$profile_image; ?>" alt="user-img" class="img-circle">
                        <a href="javascript:void(0);" class="dropdown-toggle u-dropdown text-blue"
                           data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="badge badge-danger">
                                <i class="fa fa-angle-down"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu animated flipInY">
                            <li><a href="<?= Url::to(['account/view', 'id'=>Yii::$app->user->identity->account->id])?>"><i class="fa fa-user"></i> Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= Url::to(['account/create'])?>"><i class="fa fa-cog"></i> Account Settings</a></li>
                            <li role="separator" class="divider"></li>
<!--                            <li><a href=""><i class="fa fa-power-off"></i> Logout</a></li>-->
                            <li>
                                <?= Html::a(
                                    "<i class='fa fa-power-off'></i>".Yii::t('app', 'Logout'),
                                    ['/site/logout'],
                                    ['data-method' => 'post']
                                ) ?>
                            </li>
                        </ul>
                    </div>
                    <p class="profile-text m-t-15 font-16">
                        <a href="javascript:void(0);">
                            <?= Yii::$app->user->identity->accountName ?>
                        </a>
                    </p>
                </div>
            </div>
            <nav class="sidebar-nav active">
                <ul id="side-menu" class="in">
                    <li class="">
                        <a class="active waves-effect" href="javascript:void(0);" aria-expanded="false"><i
                                    class="icon-user-following fa-fw"></i> <span class="hide-menu"> Account </span></a>
                        <ul aria-expanded="true" class="collapse in">
                            <li class=""><a href="<?= Url::to(['account/view', 'id'=>Yii::$app->user->identity->account->id])?>">View your account</a></li>
                            <li class=""><a href="<?= Url::to(['account/create'])?>">Edit your account</a></li>
                        </ul>
                    </li>
                    <li class="">
                        <a class="active waves-effect" href="javascript:void(0);" aria-expanded="false"><i
                                    class="icon-screen-desktop fa-fw"></i> <span class="hide-menu"> Dashboard <span
                                        class="label label-rounded label-info pull-right">3</span></span></a>
                        <ul aria-expanded="true" class="collapse in">
                            <li><a href="index.html">Modern Version</a></li>
                            <li class="active"><a href="index2.html" class="active">Clean Version</a></li>
                            <li><a href="index3.html">Analytical Version</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <hr>
            <nav class="sidebar-nav active">
<!--                Tepadagini ruchnoy qilib ishlataman dinamic emas-->
                <?= Menu::widget([
                    'items' => MenuHelper::getAssignedMenu(Yii::$app->user->id),
                    'options' => ['class' => '', 'id' => 'side-menu'],
                    'encodeLabels' => false, //allows you to use html in labels
                    'linkTemplate' => "<a class='waves-effect' href=\"{url}\">{label}</a>"
                ]); ?>
            </nav>
            <div class="slimScrollBar"
                 style="background: rgb(220, 220, 220); width: 5px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 1668px;"></div>
            <div class="slimScrollRail"
                 style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
        </div>
</aside>