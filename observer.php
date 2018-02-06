<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 06.02.18
 * Time: 13:30
 */
    /* необходимо учесть, что интерфейс содержит только публичные методы без реализации
       в этом основная суть интерфейса */
interface SubjectInterface  // интерфейс субъекта
{
    public function attachObserver(ObserverInterface $observer); //здесь субъект на вход будет принимат набюлдателя
    public function detachObserver(ObserverInterface $observer); //метод будет удалять наблюдателя
    public function notify();   // метод будет оповещать о изменении своего состояния

}

interface ObserverInterface // интерфейс наблюдателя
{
    public function update(SubjectInterface $subject);
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

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
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

    public function update(SubjectInterface $team)
    {
        //echo "<br/>Фанат отреагировал на событие\n";
        printf("%s отреагировал на событие команды %s<br/>", $this->getName(),$team->getName());
    }
}

$team1 =new FootballTeam('Maychester'); //создадим экземпляр класс - футбольную команду

$fan1 =new FootballFan('Pol'); //создадим экземпляр класс - болельщика №1
$fan2 =new FootballFan('Hanna'); //создадим экземпляр класс - болельщика №2

$team1->attachObserver($fan1); //нашей команде добавить наблюдателей,которые пришли на стадион
$team1->attachObserver($fan2); //нашей команде добавить наблюдателей,которые пришли на стадион

$team1->notify(); // Произошли какие-то изменения в команде,возможно забили гол и т.д...

//этап 1 добавление кода
$team1->detachObserver($fan1); // удалить фаната №1
$team1->notify();      //обновить изменения
