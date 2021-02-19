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
        'plugins/sweetalert2/sweetalert2.min.css',
        'plugins/select2/css/select2.min.css',
        'plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css',
        'css/owl.carousel.css',
        'css/magnific-popup.css',
        'css/jquery.countdown.css',
        'css/style.css',
        'css/loader.css',
        'css/theme.css',
    ];
    public $js = [
        'plugins/bootstrap/js/bootstrap.bundle.min.js',
        'plugins/sweetalert2/sweetalert2.min.js',
        'plugins/select2/js/select2.full.min.js',
        'js/jquery.hoverIntent.min.js',
        'js/jquery.waypoints.min.js',
        'js/superfish.min.js',
        'js/owl.carousel.min.js',
        'js/jquery.plugin.min.js',
        'js/jquery.magnific-popup.min.js',
        'js/jquery.countdown.min.js',
        'plugins/moment/moment.min.js',
        'plugins/jquery-validation/jquery.validate.js',
        'plugins/jquery-validation/additional-methods.min.js',
        'js/main.js',
        'js/demo-2.js',
        'js/App.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}