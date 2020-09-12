<?php

namespace taskForce\classes\action;

// доступное действие для заказчика
class ActionRefuse extends Action
{
    public function __construct()
    {
        $this->actionName = 'Отказать';
        $this->innerName = 'refuse';
        $this->class = 'refusal';

    }

    public function checkAccess(int $executorId, int $clientId, int $currentUserId): bool
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
