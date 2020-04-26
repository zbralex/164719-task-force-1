<?php

namespace taskForce\classes\action;

abstract class Action
{
public $actionName;
public $innerName;


    abstract public function checkAccess(int $executorId, int $clientId, int $currentUserId);

    abstract public function getPublicName();

    abstract public function getInnerName();


}
