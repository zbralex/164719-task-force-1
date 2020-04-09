<?php

namespace taskForce\classes\action;


class ActionNew extends Action
{

    public function getName()
    {
        if ($this->getRole($this->executorId, $this->clientId, $this->currentUserId)) {
            return self::STATUS_NEW;
        }
        return null;
    }

    public function getRole($executorId, $clientId, $currentUserId)
    {
        if ($this->executorId == $this->currentUserId || $this->currentUserId == $this->clientId) {
            return true;
        }
        return false;
    }

    public function getInnerName()
    {
        return self::ACTION_NEW;
    }
}
