<?php

namespace taskForce\classes\action;


class ActionRefuse extends Action {


    public function getRole($executorId, $clientId, $currentUserId)
    {
        // TODO: Implement getRole() method.
    }

    public function getName()
    {
        // вызывает статус из своего класса (аналогично ActionRefuse::STATUS_FAIL)
        return self::STATUS_FAIL;
    }

    public function getInnerName()
    {
        return self::ACTION_REFUSE;
    }
}
