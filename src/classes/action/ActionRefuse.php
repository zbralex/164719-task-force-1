<?php

namespace taskForce\classes\action;


class ActionRefuse extends Action
{
    public function __construct()
    {
        $this->actionName = 'Отказаться';
        $this->innerName = 'refuse';

    }

    public function checkAccess($executorId, $clientId, $currentUserId): bool
    {
        if ($clientId == $currentUserId) {
            return true;
        }
        return false;
    }


    public function getInnerName(): string
    {
        return $this->innerName;
    }


    public function getPublicName(): string
    {
        return $this->actionName;
    }
}
