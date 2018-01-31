<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 27.01.18
 * Time: 13:17
 */

// code there [
class Singleton {
    protected static $instance; /* статическое поле в котором будет храниться то или иное значение
     или объект какого-то класса, к которому мы хотим получить доступ из другого места программы*/

    /* реализация статич. метода getInstance. По сути метод будет возвращать
     нам значение поля instance. Внутри данного метода происходит следующее:
    если в поле ::$instance записан */
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            $class = __CLASS__;
            self::$instance =new $class();
            echo "<p>First initialization</p>";
        }else {
            echo "<p>... initialization</p>";
        }
        return self::$instance;
    }
    /* устранение возможности создания объекта данного класса
       через new Singlton клонирование и т.д */
    private function __construct(){}
    private function __clone()    {}
    private function __wakeup()   {}

}
Singleton::getInstance();
Singleton::getInstance();
Singleton::getInstance();

//  ] END code
