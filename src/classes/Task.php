<?php

namespace taskForce\classes;

class Task
{

    // statuses

    const STATUS_NEW = 'new'; // Новое	Задание опубликовано, исполнитель ещё не найден
    const STATUS_PROGRESS = 'progress'; // В работе	Заказчик выбрал исполнителя для задания
    const STATUS_CANCEL = 'cancelled'; // Отменено	Заказчик отменил задание
    const STATUS_COMPLETE = 'completed'; // Выполнено	Заказчик отметил задание как выполненное
    const STATUS_FAIL = 'failed'; // Провалено	Исполнитель отказался от выполнения задания


    // actions
    const ACTION_NEW = 'new task';
    const ACTION_CANCEL = 'cancel'; // отменить - заказчик
    const ACTION_RESPONSE = 'response'; // откликнуться - исполнитель

    const ACTION_COMPLETE = 'complete'; // завершить - заказчик
    const ACTION_REFUSE = 'refuse'; // отказаться - исполнитель
    public static $mapAction = [
        self::ACTION_CANCEL => 'Отменить',
        self::ACTION_RESPONSE => 'Откликнуться',
        self::ACTION_COMPLETE => 'Выполнено',
        self::ACTION_REFUSE => 'Отказаться'
    ];
    public $mapStatus = [ // вернуть статус на русском языке
        self::STATUS_NEW => 'Новое',
        self::STATUS_PROGRESS => 'В работе',
        self::STATUS_CANCEL => 'Отменено',
        self::STATUS_COMPLETE => 'Выполнено',
        self::STATUS_FAIL => 'Провалено',
    ];

    public $executorID; // исполнитель
    public $clientId;// заказчик
    public $currentUserId;
    public $status = ''; // статус

    public function __construct($status, $executorID, $clientId, $currentUserId) // конструктор
    {
        $this->clientId = $clientId;
        $this->executorID = $executorID;
        $this->currentUserId = $currentUserId;
        $this->status = $status;
    }

    public function getAvailableActions()
    {
        $actions = []; // пустой массив действий
        $executor = $this->currentUserId !== $this->clientId; // исполнитель
        $client = $this->currentUserId == $this->clientId; // заказчик


       switch ($this->status) {
           case self::STATUS_NEW and $executor:
               $actions = [self::ACTION_RESPONSE, self::ACTION_CANCEL];
               break;

           case self::STATUS_PROGRESS and $client:
               $actions = [self::ACTION_REFUSE, self::ACTION_CANCEL];
               break;
       }
        return $actions;
    }
    // он должен возвращать список доступных классов-действий
    // в зависимости от статуса задания и ID пользователя
}
