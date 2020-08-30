<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class JoinAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/join.css',
        'plugins/daterangepicker/daterangepicker.css',
        
    ];
    public $js = [
    	'plugins/moment/moment.min.js',
    	'plugins/daterangepicker/daterangepicker.js',
    ];
    public $depends = [
    	'frontend\assets\AppAsset'
    ];
}
