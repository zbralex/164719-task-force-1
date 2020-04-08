<?php

namespace taskForce\classes\action;


class ActionResponse extends Action {



    public function getRole($executorId, $clientId, $currentUserId)
    {
        $this->clientId = $clientId;
        $this->executorId = $executorId;
        $this->currentUserId = $currentUserId;
    }

    public function getName()
    {
        return self::STATUS_PROGRESS;
    }

    public function getInnerName()
    {
        return self::ACTION_RESPONSE;
    }
}
