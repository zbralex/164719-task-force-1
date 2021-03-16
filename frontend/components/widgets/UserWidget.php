<?php
namespace frontend\components\widgets;
use frontend\models\User;
use frontend\models\UserInfo;
use Yii;
use yii\base\Widget;

class UserWidget extends Widget {


    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $userInfo = [];
        if (!Yii::$app->user->isGuest) {
            $userInfo = UserInfo::find()->where(['user_id'=>Yii::$app->user->identity->getId()])->one();
        }
        return $this->render('user', [
           'userInfo' => $userInfo
        ]);
    }

}
