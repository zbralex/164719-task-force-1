<?php

namespace taskForce\classes\action;


class ActionNew extends Action {

    public function getRole($executorId, $clientId, $currentUserId)
    {

    }

    public function getName()
    {
       return self::STATUS_NEW;
    }

    public function getInnerName()
    {
        return self::ACTION_NEW;
    }
}
