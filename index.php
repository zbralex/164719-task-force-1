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
$actionRefuse = new ActionRefuse();
$actionResponse = new ActionResponse();


assert($actionComplete->getRole(233, 233, 233) == $actionComplete->getName(), print('Выполнено'));
assert($actionCancel->getRole(233, 233, 233) == $actionCancel->getName(), print('Отменено'));
assert($actionResponse->getRole(233, 233, 233) == $actionResponse->getName(), print('В работе'));
assert($actionRefuse->getRole(233, 233, 233) == $actionRefuse->getName(), print('Провалено'));
assert($actionNew->getRole(233, 233, 233) == $actionNew->getName(), print('Новое'));


