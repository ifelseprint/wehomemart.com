<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'icon/font-awesome/css/font-awesome.min.css',
        'css/bootstrap.min.css',
        'css/owl.carousel.css',
        'css/magnific-popup.css',
        'css/jquery.countdown.css',
        'css/style.css',
        'css/loader.css',
        'css/theme.css',
    ];
    public $js = [
        'js/bootstrap.bundle.min.js',
        'js/jquery.hoverIntent.min.js',
        'js/jquery.waypoints.min.js',
        'js/superfish.min.js',
        'js/owl.carousel.min.js',
        'js/jquery.plugin.min.js',
        'js/jquery.magnific-popup.min.js',
        'js/jquery.countdown.min.js',
        'js/main.js',
        'js/demo-2.js',
        'js/App.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}