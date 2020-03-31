<?php

class Task
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

    public $mapStatus = [ // вернуть статус на русском языке
        self::STATUS_NEW => 'Новое',
        self::STATUS_PROGRESS => 'В работе',
        self::STATUS_CANCEL => 'Отменено',
        self::STATUS_COMPLETE => 'Выполнено',
        self::STATUS_FAIL => 'Провалено',
    ];

    public $mapAction = [
        self::ACTION_CANCEL => 'Отменить',
        self::ACTION_RESPONSE => 'Откликнуться',
        self::ACTION_COMPLETE => 'Выполнено',
        self::ACTION_REFUSE => 'Отказаться'
    ];

    /**
     * @return string[]
     */
    public function getMapAction()
    {
        return $this->mapAction;
    }

    /**
     * @return string[]
     */
    public function getMapStatus()
    {
        return $this->mapStatus;
    }

    public function getStatus($action)
    {

        switch ($action) {
            case self::ACTION_NEW:
                return self::STATUS_NEW;

            case self::ACTION_CANCEL:
                return self::STATUS_CANCEL;

            case self::ACTION_RESPONSE:
                return self::STATUS_PROGRESS;

            case self::ACTION_COMPLETE:
                return self::STATUS_COMPLETE;

            case self::ACTION_REFUSE:
                return self::STATUS_FAIL;
        }
        return null;
    }
}
