<?php

require_once './src/Functions/TaskHandler/Task.php';

use src\Functions\TaskHandler\Task;


$task = new Task('',1,4);

assert($task->getStatus(Task::ACTION_NEW) === Task::STATUS_NEW, print('Новое'));
assert($task->getStatus(Task::ACTION_CANCEL) === Task::STATUS_CANCEL, print('Отменено'));
assert($task->getStatus(Task::ACTION_RESPONSE) === Task::STATUS_PROGRESS, print('В работе'));
assert($task->getStatus(Task::ACTION_COMPLETE) === Task::STATUS_COMPLETE, print('Выполнено'));
assert($task->getStatus(Task::ACTION_REFUSE) === Task::STATUS_FAIL, print('Провалено'));


