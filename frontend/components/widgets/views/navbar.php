<?php
/* @var $this \yii\web\View */

/* @var array $notifications */

use yii\helpers\Url;

?>

<div class="header__lightbulb"></div>
<div class="lightbulb__pop-up">
    <h3>Новые события</h3>

    <?php foreach ($notifications as $notification): ?>
    <p class="lightbulb__new-task lightbulb__new-task--message">
        <?= $notification->title; ?>
        <a href="<?= Url::to('/task/view/' . $notification->task_id)?>" class="link-regular">«<?= $notification->title; ?>»</a>
    </p>
    <p class="lightbulb__new-task lightbulb__new-task--executor">
        Выбран исполнитель для
        <a href="#" class="link-regular">«Помочь с курсовой»</a>
    </p>
    <p class="lightbulb__new-task lightbulb__new-task--close">
        Завершено задание
        <a href="#" class="link-regular">«Помочь с курсовой»</a>
    </p>
    <?php endforeach;?>
</div>
