<?php

namespace taskForce\classes\action;

abstract class Action
{

    // statuses

    const STATUS_NEW = 'new'; // новое
    const STATUS_PROGRESS = 'progress'; // в работе
    const STATUS_CANCEL = 'cancelled'; // отменено
    const STATUS_COMPLETE = 'completed'; // выполнено
    const STATUS_FAIL = 'failed'; // провалено


    // actions
    const ACTION_NEW = 'new task';
    const ACTION_CANCEL = 'cancel'; // отменить - заказчик
    const ACTION_RESPONSE = 'response'; // откликнуться - исполнитель
    const ACTION_COMPLETE = 'complete'; // завершить - заказчик
    const ACTION_REFUSE = 'refuse'; // отказаться - исполнитель

    abstract public function getName();

    abstract public function getInnerName();

    abstract public function getRole($executorId, $clientId, $currentUserId);
}
