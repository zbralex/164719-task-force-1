<?php

namespace taskForce\classes\uploader;


use frontend\models\PortfolioPhoto;
use Yii;
use yii\web\UploadedFile;

abstract class Uploader
{
    public static function uploadFiles($param) {

        $fileName = $param;


        $files = UploadedFile::getInstancesByName($fileName);
        $dir = Yii::getAlias('@app') . '/web/upload/' . date("Y-m-d") .'_'. date("H-m") . '/';
        if(!is_dir($dir)) {
            mkdir($dir, 0777);
        }
        foreach($files as $file) {

            $file->saveAs($dir . $file->baseName . '.' . $file->extension);

            $portfolioPhoto = new PortfolioPhoto();
            $portfolioPhoto->user_id = Yii::$app->user->identity->getId();
            $portfolioPhoto->rating = 0;
            $portfolioPhoto->url = '/upload/' . date("Y-m-d") . '_' . date("H-m") . '/' . $file->baseName . '.' . $file->extension;
            $portfolioPhoto->title = $file->baseName;
            $portfolioPhoto->description = $file->baseName;
            $portfolioPhoto->save();
        }
    }
}
