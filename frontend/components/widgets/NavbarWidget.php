<?php
namespace frontend\components\widgets;
use frontend\models\Notification;
use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class NavbarWidget extends Widget {
    public $message;

    public function init()
    {
        parent::init();
        if ($this->message === null) {
            $this->message = 'Hello World';
        }

    }

    public function run()
    {
        $notifications = [];
        if (!Yii::$app->user->isGuest) {
            $notifications = Notification::find()->where(['user_id'=> Yii::$app->user->identity->getId()])->all();
        }
        return $this->render('navbar', [
           'notifications' => $notifications
        ]);
    }

}
