<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<h1>Observer</h1>
<body>

</body>
</html>

<?php

/* необходимо учесть, что интерфейс содержит только публичные методы без реализации
       в этом основная суть интерфейса */
interface SubjectInterface  // интерфейс субъекта
{
    public function attachObserver(ObserverInterface $observer); //здесь субъект на вход будет принимат набюлдателя
    public function detachObserver(ObserverInterface $observer); //метод будет удалять наблюдателя
    public function notify(EventInterface $event);   // метод будет оповещать о изменении своего состояния

}

interface ObserverInterface // интерфейс наблюдателя
{
    public function update(EventInterface $event);
}

interface EventInterface //кто сгенерировал данное событие
{
    public function getName(); // имя события
    public function getSender(); //инициатор событий
}
//пример про футб. команду-субъект

class FootballTeam implements SubjectInterface
{
    private $name;
    private $observers = []; // массив для сохранения наблюдателей

    public function __construct($name)
     {
         $this->name = $name;
     }

    public function attachObserver(ObserverInterface $observer)
    {
        $this->observers[] = $observer; //реализация метода attach
    }
    public function detachObserver(ObserverInterface $observer)
    {
        foreach ($this->observers as $key =>$obs) //перебор всех имеющихся на текущий момент наблюдателей
        {
            if ($obs === $observer) // проверка наблюдателя на идентичность в данной итерации
            {
                unset($this->observers[$key]); //удаление непосредственно элемента из массива по указанному ключу
                return; //если мы нашли то что искали,то необходимо выйти
            }
        }
    }

    public function getName() // метод получения имени
    {
        return $this->name;
    }

    public function notify(EventInterface $event)
    {
        foreach ($this->observers as $observer) {
            $observer->update($event);
        }
    }

    public function goalAction() //событие на гол
    {
        $event =new FootballEvent(FootballEvent::GOAL, $this); // создадим объект события
        $this->notify($event); // мы описали действие гол
    }

    public function goalEnemyAction() //событие на гол в наши ворота
    {
        $event =new FootballEvent(FootballEvent::GOAL_ENEMY, $this); // создадим объект события
        $this->notify($event); //
    }

    public function fightAction() //событие на гол
    {
        $event =new FootballEvent(FootballEvent::FIGHT, $this); // создадим объект события
        $this->notify($event); // мы описали действие драка
    }
}

//реализация наблюдателей
class FootballFan implements ObserverInterface
{
    private $name;

    public function __construct($name)  //конструктор будет добавлять name
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function update(EventInterface $event)
    {
        //echo "<br/>Фанат отреагировал на событие\n";
        switch ($event->getName()) {
            case FootballEvent::GOAL:
                printf("Гол!! %s кричит во всю глотку <br/>", $this->getName());
                break;
            case FootballEvent::GOAL_ENEMY:
                printf("Нам забили гол %s кричит судью на мыло!! <br/>", $this->getName());
                break;
            case FootballEvent::FIGHT:
                printf("%s ломает стул и бьет по голове соседа <br/>", $this->getName());
                break;
            default:
                printf("%s и команда %s в замешательстве...<br/>",
                    $this->getName(),$event->getSender()->getName());
        }

    }
}
//реализация EventInterface
class FootballEvent implements EventInterface
{
    const GOAL ='goal'; //событие ГОЛ
    const GOAL_ENEMY ='goal_enemy'; //гол в наши ворота,т.е. нам забили
    const FIGHT = 'fight'; //драка на поле

    private $name; //хранение имени в закрытом свойстве
    private $sender;

    public function __construct($name, FootballTeam $sender)
    {
        $this->name = $name;
        $this->sender = $sender;
    }

    public function getName()
    {
        return $this->name; //возвратит имя
    }

    public function getSender()
    {
        return $this->sender;
    }
}

$team1 =new FootballTeam('Maychester'); //создадим экземпляр класс - футбольную команду

$fan1 =new FootballFan('Pol'); //создадим экземпляр класс - болельщика №1
$fan2 =new FootballFan('Hanna'); //создадим экземпляр класс - болельщика №2

$team1->attachObserver($fan1); //нашей команде добавить наблюдателей,которые пришли на стадион
$team1->attachObserver($fan2); //нашей команде добавить наблюдателей,которые пришли на стадион

 // событие 1
$team1->goalAction();
 // добавил событие 2
$team1->goalEnemyAction();

//$team1->detachObserver($fan1); // удалить фаната №1

//добавим событие 3 драку
$team1->fightAction();

// добавим событие 4
$fan3 =new FootballFan('Jonathan Bad');
$team1->attachObserver($fan3);

$team1->fightAction();