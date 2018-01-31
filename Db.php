<?php
  // реализация Singleton
class Db {
    private static $_db = null;   // статическое поле $_db
    public static function getInstance() // метод getInstance возвращает объект PDO
    {
        if (self::$_db === null) {
            self::$_db = new PDO('mysql:host=localhost;dbname=basa1','root','sql123');
        }
        return self::$_db;
    }
    private function __construct()  {}
    private function __clone()      {}
    private function __wakeup()      {}

}