<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class CreateTaskDropZone extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $js = [
        '/js/dropzone.js',
        '/js/initDropZone.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
