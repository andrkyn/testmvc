<?php

// данный класс get построен по шаблону "Фабрика"
class get {
    public static function create($class) {
        if (file_exists('classes/'.$class.".php")) { //проверка на существование файла
            include_once 'classes/'.$class.".php"; //подключаем (подгружаем) скласс
            if(class_exists($class)) { //если в данном файле есть класс с именем test
                $o= new $class;        // создаем объект
                $o->init();            //у данного объекта вызываем метод init
                return $o;             //возвращаем объект класса
            }
        }
    }
}
 /* тут обращаемся к классу get, вызываем его статический метод create
    и передаем имя класса, которое хотим загрузить класс test, т.е. имя класса test
   попадает в ...lic static function create($class) */

get::create('test');
get::create('example');

?>