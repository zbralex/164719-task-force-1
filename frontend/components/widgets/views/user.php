<?php
/* @var $this \yii\web\View */

/* @var array $userInfo */

use yii\helpers\Url;

?>

<div class="header__account">
    <a class="header__account-photo"><img src="<?= $userInfo->user_pic?>" width="43" height="44" alt="Аватар пользователя"></a>
        <span class="header__account-name"><?= $userInfo->user->name;?></span>
</div>

