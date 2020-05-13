<?php
ini_set("auto_detect_line_endings", true);
use taskForce\classes\Task;

use taskForce\classes\action\ActionCancel;
use taskForce\classes\action\ActionComplete;
use taskForce\classes\action\ActionNew;
use taskForce\classes\action\ActionRefuse;
use taskForce\classes\action\ActionResponse;

use taskForce\classes\utils\DataLoader;


use taskForce\exceptions\TaskException;
use taskForce\exceptions\RoleException;


require_once 'vendor/autoload.php';


$task = new Task('new');
$task1 = new Task('progress');

$loader = new DataLoader('./data/categories.csv', ['name','icon']);
$records = [];
$loader -> import();
//$records = $loader->parseFromCsvToSql();
$r = $loader->scanDirectory('./data');
$loader->scanDirectory('./data');
$loader->toSql();
//$loader->test('./data');



$actionNew =  new ActionNew();
$actionCancel = new ActionCancel();
$actionComplete = new ActionComplete();
$actionRefuse = new ActionRefuse();
$actionResponse = new ActionResponse();

try {
    $task->getAvailableActions('executor');
    $task1->getAvailableActions('client');
    //$task1->getAvailableActions('');
    $loader->import();
    $records = $loader->getData();


}
catch (TaskException $e) {
    printf('Error: ' . $e->getMessage());
}
catch (RoleException $e) {
    printf('Error: ' . $e->getMessage());
}
catch (\Exception $e) {
    error_log("Не удалось обработать csv файл: " . $e->getMessage());
}


