<?php

namespace frontend\controllers;


use frontend\models\Attachment;
use frontend\models\Categories;
use frontend\models\forms\AccountForm;
use frontend\models\PortfolioPhoto;
use frontend\models\SiteSettings;
use frontend\models\Task;
use frontend\models\User;
use frontend\models\UserCategory;
use frontend\models\UserInfo;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;

class AccountController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;


    public function actionUploadFile() {
            $fileName = 'file';
            $uploadPath =  Yii::getAlias('@app') . '/web/upload/';

            $files = UploadedFile::getInstancesByName($fileName);
            var_dump($files);
            //echo  Json::encode($_FILES);
            foreach($files as $file) {
                $file->saveAs( $uploadPath . $file->baseName . '.' . $file->extension);
            }

    }


    public function actionIndex()
    {

        $model = new AccountForm();

        $userInfo = UserInfo::findOne(['user_id' => Yii::$app->user->identity->getId()]);

        // для изменения данных полей не нужно использовать ключевое слово new (ex.: User())
        // для создания новой записи в БД используется ключевое слово new (ex.: new User())
        $user = User::findOne(['id' => Yii::$app->user->identity->getId()]);

        $siteSettings = SiteSettings::findOne(['user_id' => Yii::$app->user->identity->getId()]);




            if ($model->load(Yii::$app->request->post())) {
                // n.b. обязательно загружать данные  POST-запроса из формы!
                $model->load(Yii::$app->request->post());

                $user->id = Yii::$app->user->identity->getId();
                $user->email = $model->email;
                $user->password = Yii::$app->getSecurity()->generatePasswordHash($model->re_password);
                $user->save(false);


                $userInfo->user_id = Yii::$app->user->identity->getId();
                $userInfo->address = $model->address;
                $userInfo->date_birth = $model->date_of_birth;
                $userInfo->about = $model->about_myself;

                $userInfo->phone = $model->phone;
                $userInfo->skype = $model->skype;
                $userInfo->telegram = $model->another_messenger;
                $model->userPic = UploadedFile::getInstance($model, 'userPic');

                if ($model->userPic) {
                    $model->upload();
                    $path = '/upload/' . date("Y-m-d") .'_'. date("H-m") . '/' . $model->userPic->baseName . '.' . $model->userPic->extension;
                    $userInfo->user_pic = $path;
                }





                $userInfo->save(false);


                if ($model->user_category) {
                    foreach ($model->user_category as $item) {


                        $userCategories = new UserCategory();


                        $userCategories->user_id = Yii::$app->user->identity->getId();
                        $userCategories->category_id = intval($item);


                        $userCategories->save(false);


                    }
                }


                $siteSettings->user_id = Yii::$app->user->identity->getId();
                $siteSettings->new_message = $model->show_new_messages;
                $siteSettings->actions_in_task = $model->show_actions_of_task;
                $siteSettings->new_review = $model->show_new_review;
                $siteSettings->show_contacts_client = $model->show_my_contacts_customer;
                $siteSettings->show_profile = $model->hide_account;
                $siteSettings->save(false);
            }



        return $this->render('index', [
            'model' => $model,
            'userInfo' => $userInfo
        ]);
    }

}
