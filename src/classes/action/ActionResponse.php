<?php

namespace taskForce\classes\action;


class ActionResponse extends Action
{

    // отклик на задание
    // откликнуться может пользователь, чей id равен id текущего польз-ля
    // и не равен id заказчика
    public function getName()
    {
        if ($this->getRole($this->executorId, $this->clientId, $this->currentUserId) && self::STATUS_NEW) {
            return self::STATUS_PROGRESS;
        }
        return null;
    }

    public function getRole($executorId, $clientId, $currentUserId)
    {
        if ($this->executorId == $this->currentUserId && !$this->clientId) {
            return true;
        }
        return false;
    }

    public function getInnerName()
    {
        return self::ACTION_RESPONSE;
    }
}
