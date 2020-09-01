<?php
declare(strict_types=1);

namespace taskForce\classes;


use taskForce\classes\action\ActionCancel;
use taskForce\classes\action\ActionComplete;
use taskForce\classes\action\ActionDone;
use taskForce\classes\action\ActionNew;
use taskForce\classes\action\ActionRefuse;
use taskForce\classes\action\ActionResponse;
use taskForce\exceptions\TaskException;
use taskForce\exceptions\RoleException;

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
    const ACTION_DONE = 'refuse'; // завершить - заказчик

//    public static $mapAction = [
//        self::ACTION_CANCEL => 'Отменить',
//        self::ACTION_RESPONSE => 'Откликнуться',
//        self::ACTION_COMPLETE => 'Выполнено',
//        self::ACTION_REFUSE => 'Отказаться',
//        self::ACTION_DONE => 'Завершить'
//    ];

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
    public $currentUserId; // текущий пользователь
    public $status = ''; // статус

    public function __construct(string $status) // конструктор
    {
        if (!isset($this->mapStatus[$status])) {
            throw new TaskException('Неверно передан статус');
        }



        $this->status = $status;

        $this->actionNew = new ActionNew();
        $this->actionCancel = new ActionCancel();
        $this->actionComplete = new ActionComplete();
        $this->actionRefuse = new ActionRefuse();
        $this->actionResponse = new ActionResponse();
        $this->actionDone = new ActionDone();

    }

    public function getAvailableActions(string $role): array
    {
        $actions = []; // пустой массив действий


        //Чтобы стать исполнителем необходимо отметить хотя бы одну специализацию у себя в профиле
        // исполнитель
        if (empty($role)) {
            throw new RoleException('Не передано имя роли в параметрах');
        }


        switch ($this->status) {
            case self::STATUS_NEW and $role == 1:
                $actions = [$this->actionResponse, $this->actionCancel, $this->actionDone];
                break;

            case self::STATUS_PROGRESS and $role == 2:
                $actions = [$this->actionRefuse, $this->actionCancel];
                break;
            // если ни одно из действий не найдено, вернуть исключение
            default:
                throw new TaskException('Действие не найдено');
        }
        return $actions;
    }
    // он должен возвращать список доступных классов-действий
    // в зависимости от статуса задания и ID пользователя
}
