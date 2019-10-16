<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'css/site.css',
        'plugins/demo/css/animate.css',
        'plugins/demo/css/style.css',
        'plugins/demo/css/colors/default.css',
    ];
    public $js = [
//        'plugins/components/jquery/dist/jquery.min.js',
        'plugins/demo/js/jquery.slimscroll.js',
        'plugins/demo/js/waves.js',
        'plugins/demo/js/sidebarmenu.js',
        'plugins/demo/js/custom.js',
        'plugins/components/styleswitcher/jQuery.style.switcher.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
