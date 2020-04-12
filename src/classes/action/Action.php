<?php

namespace taskForce\classes\action;

abstract class Action
{
public $actionName;
public $innerName;
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

    public $clientId, $executorId, $currentUserId;

    abstract public function checkAccess($executorId, $clientId, $currentUserId);

    abstract public function getPublicName();

    abstract public function getInnerName();


}
