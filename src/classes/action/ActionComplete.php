<?php

namespace taskForce\classes\action;


class ActionComplete extends Action
{
    public function getName()
    {
        if ($this->getRole($this->executorId, $this->clientId, $this->currentUserId)) {
            return self::STATUS_COMPLETE;
        }
    }

    public function getRole($executorId, $clientId, $currentUserId)
    {
        if ($executorId == $currentUserId) {
            return true;
        }
        return false;
    }

    public function getInnerName()
    {
        return self::ACTION_COMPLETE;
    }
}
