<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AutoComplete extends AssetBundle
{
	public $basePath = '@webroot';
	public $baseUrl = '@web';

	public $js = [
		'/js/autoComplete.js'
	];
	public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
}
