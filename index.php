<?php

use taskForce\classes\Task;

use taskForce\classes\action\ActionCancel;
use taskForce\classes\action\ActionComplete;
use taskForce\classes\action\ActionNew;
use taskForce\classes\action\ActionRefuse;
use taskForce\classes\action\ActionResponse;

require_once 'vendor/autoload.php';


$task = new Task('', 1, 4);

$actionNew =  new ActionNew();
$actionCancel = new ActionCancel();
$actionComplete = new ActionComplete();
//var_dump($actionNew -> getName());
//var_dump($actionCancel -> getName());

var_dump($actionCancel ->getRole(233, 233, 233), $actionCancel->getName());
var_dump($actionComplete ->getRole(233, 233, 233), $actionComplete->getName());

//assert($task->getStatus(Task::ACTION_NEW) === Task::STATUS_NEW, print('Новое'));
//assert($task->getStatus(Task::ACTION_CANCEL) === Task::STATUS_CANCEL, print('Отменено'));
//assert($task->getStatus(Task::ACTION_RESPONSE) === Task::STATUS_PROGRESS, print('В работе'));
//assert($task->getStatus(Task::ACTION_COMPLETE) === Task::STATUS_COMPLETE, print('Выполнено'));
//assert($task->getStatus(Task::ACTION_REFUSE) === Task::STATUS_FAIL, print('Провалено'));


