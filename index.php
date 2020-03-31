<?php

require_once 'classes/Task.php';
// test
require_once 'classes/SomeClass.php';


$task = new Task();

 // test
$taskComplete = new Task();



assert($task->getStatus(Task::ACTION_NEW) === Task::STATUS_NEW, print('Новое'));
assert($task->getStatus(Task::ACTION_CANCEL) === Task::STATUS_CANCEL, print('Отменено'));
assert($task->getStatus(Task::ACTION_RESPONSE) === Task::STATUS_PROGRESS, print('В работе'));
assert($task->getStatus(Task::ACTION_COMPLETE) === Task::STATUS_COMPLETE, print('Выполнено'));
assert($task->getStatus(Task::ACTION_REFUSE) === Task::STATUS_FAIL, print('Провалено'));
