<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Menu;

$items = [
    ['label' => '<i class="icon-magnifier-add fa-fw"></i> <span class="hide-menu"> Add pilgrim</span>', 'url' => ['/pilgrim/vue-index']],
    ['label' => '<i class="icon-folder-alt fa-fw"></i> <span class="hide-menu"> Account</span>', 'url' => ['/account/index']],
    ['label' => '<i class="icon-folder-alt fa-fw"></i> <span class="hide-menu"> Airport</span>', 'url' => ['/airport/index']],
    ['label' => '<i class="icon-folder-alt fa-fw"></i> <span class="hide-menu"> Country</span>', 'url' => ['/country/index']],
    ['label' => '<i class="icon-rocket fa-fw"></i> <span class="hide-menu"> Flight</span>', 'url' => ['/flight/index']],
    ['label' => '<i class="icon-folder-alt fa-fw"></i> <span class="hide-menu"> Pilgrim</span>', 'url' => ['/pilgrim/index']],
    ['label' => '<i class="icon-hourglass fa-fw"></i> <span class="hide-menu"> Group</span>', 'url' => ['/group/index']],
    ['label' => '<i class="icon-folder-alt fa-fw"></i> <span class="hide-menu"> Mahram name</span>', 'url' => ['/mahram-name/index']],
    ['label' => '<i class="icon-folder-alt fa-fw"></i> <span class="hide-menu"> Pilgrim type</span>', 'url' => ['/pilgrim-type/index']],
    ['label' => '<i class="icon-folder-alt fa-fw"></i> <span class="hide-menu"> Region</span>', 'url' => ['/region/index']],
    ['label' => '<i class="icon-handbag fa-fw"></i> <span class="hide-menu"> Season</span>', 'url' => ['/season/index']],
    ['label' => '<i class="icon-docs fa-fw"></i> <span class="hide-menu"> Visa number</span>', 'url' => ['/visa-number/index']],
    ['label' => '<i class="icon-docs fa-fw"></i> <span class="hide-menu"> Import excel</span>', 'url' => ['/import/excel']],
];

?>
<aside class="sidebar" role="navigation">
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
            <div class="am-sideleft">
<!--            <nav class="sidebar-nav active">-->
                <?= Menu::widget([
                    'options' => ['class' => 'nav am-sideleft-tab'],
                    'items' => $items,
                    'encodeLabels' => false, //allows you to use html in labels
                    'linkTemplate' => "<li class='nav-item'><a class='nav-link' href='{url}'>{label}</a></li>"
                ]); ?>
<!--            </nav>-->
            </div>
            <div class="slimScrollBar"
                 style="background: rgb(220, 220, 220); width: 5px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 1668px;"></div>
            <div class="slimScrollRail"
                 style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
        </div>
</aside>