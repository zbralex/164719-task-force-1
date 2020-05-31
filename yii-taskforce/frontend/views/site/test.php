<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use frontend\tests\unit\models;


$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
$users = \common\models\User::find()->all();
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php
    print "<ul>";
    foreach ($users as $item) {

        print("<li>" . $item['id'] . " <strong>". $item['email']."</strong></li>");
    }
    print "</ul>";
    ?>
</div>
