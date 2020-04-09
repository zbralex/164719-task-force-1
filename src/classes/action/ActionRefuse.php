<?php

namespace taskForce\classes\action;


class ActionRefuse extends Action
{

    //ACTION_REFUSE => 'Отказаться'
    // отказаться можно, если статус "в работе" и "новый"
    // если id исполнителя равен id пользователя
    public function getName()
    {
        // вызывает статус из своего класса (аналогично ActionRefuse::STATUS_FAIL)
        if ($this->getRole($this->executorId, $this->clientId, $this->currentUserId) && self::STATUS_PROGRESS) {
            return self::STATUS_FAIL; // задание провалено
        }
        if ($this->getRole($this->executorId, $this->clientId, $this->currentUserId) && self::STATUS_NEW) {
            return self::STATUS_CANCEL; // отказались от задания
        }
        return null;
    }

    public function getRole($executorId, $clientId, $currentUserId)
    {

        if ($this->executorId == $this->currentUserId) {
            return true;
        }
        return false;
    }

    public function getInnerName()
    {
        return self::ACTION_REFUSE;
    }
}
