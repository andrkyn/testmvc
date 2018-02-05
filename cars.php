<?php

abstract class Car {
    public $color;

    public function __construct($color) {
        $this->color =$color;
        echo $this->color;
    }
}

class Toyota extends Car {

    public function __construct($color){
        echo parent::__construct($color);
    }
}

class Chevrolet extends Car {

    public function __construct($color){
        echo parent::__construct($color);
    }
}

class Ford extends Car {

    public function __construct($color){
        echo parent::__construct($color);
    }
}

class get { //это и есть вспомогательный класс, который регулирует
// в зависимости от воходных параметров - какой именно объект класса необходимо создать
    static public function create($type,$color) {
        switch($type) {
            case 'Toyota':
                return new Toyota($color); // создаем объект класса Toyota и контсруктору
                                           // данного класса передаём переменную $color
                break;

            case 'Chevrolet':
                return new Chevrolet($color); // создаем объект класса Toyota и контсруктору
                // данного класса передаём переменную $color
                break;

            case 'Ford':
                return new Ford($color); // создаем объект класса Toyota и контсруктору
                // данного класса передаём переменную $color
                break;
        }
    }
}
$car =get::create('Chevrolet','green');
var_dump($car);

?>