<?php
declare(strict_types=1);
namespace taskForce\classes;


use taskForce\classes\action\ActionCancel;
use taskForce\classes\action\ActionComplete;
use taskForce\classes\action\ActionNew;
use taskForce\classes\action\ActionRefuse;
use taskForce\classes\action\ActionResponse;
use taskForce\exceptions\TaskException;


class Task
{

const STATUS_NEW = 'new';
    // statuses
const STATUS_PROGRESS = 'progress'; // Новое	Задание опубликовано, исполнитель ещё не найден
    const STATUS_CANCEL = 'cancelled'; // В работе	Заказчик выбрал исполнителя для задания
    const STATUS_COMPLETE = 'completed'; // Отменено	Заказчик отменил задание
    const STATUS_FAIL = 'failed'; // Выполнено	Заказчик отметил задание как выполненное
        const ACTION_NEW = 'new task'; // Провалено	Исполнитель отказался от выполнения задания


    // actions
const ACTION_CANCEL = 'cancel';
    const ACTION_RESPONSE = 'response'; // отменить - заказчик
    const ACTION_COMPLETE = 'complete'; // откликнуться - исполнитель
const ACTION_REFUSE = 'refuse'; // завершить - заказчик
        public static $mapAction = [
        self::ACTION_CANCEL => 'Отменить',
        self::ACTION_RESPONSE => 'Откликнуться',
        self::ACTION_COMPLETE => 'Выполнено',
        self::ACTION_REFUSE => 'Отказаться'
    ]; // отказаться - исполнитель
    public $actionNew, $actionCancel, $actionComplete, $actionRefuse, $actionResponse;
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

    public function __construct(string $status, int $executorID, int $clientId, int $currentUserId) // конструктор
    {
        if ($status === '') {
            throw new TaskException('Пустое поле статуса');
        }

        $this->clientId = $clientId;
        $this->executorID = $executorID;
        $this->currentUserId = $currentUserId;
        $this->status = $status;

        $this->actionNew = new ActionNew();
        $this->actionCancel = new ActionCancel();
        $this->actionComplete = new ActionComplete();
        $this->actionRefuse = new ActionRefuse();
        $this->actionResponse = new ActionResponse();

    }

    public function getAvailableActions():array
    {
        $actions = []; // пустой массив действий
        $executor = $this->currentUserId !== $this->clientId; // исполнитель
        $client = $this->currentUserId == $this->clientId; // заказчик

        if (!isset($executor)) {
            throw new TaskException('исполнитель не найден');
        }

        if (!isset($client)) {
            throw new TaskException('заказчик не найден');
        }

        switch ($this->status) {
            case self::STATUS_NEW and $executor:

                $actions = [$this->actionResponse, $this->actionCancel];

                break;

            case self::STATUS_PROGRESS and $client:

                $actions = [$this->actionRefuse, $this->actionCancel];

                break;
        }
        return $actions;
    }
    // он должен возвращать список доступных классов-действий
    // в зависимости от статуса задания и ID пользователя
}
