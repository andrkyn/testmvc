<?php

class test {
    public function __construct()
    {
        echo "Это класс - ".__CLASS__;
    }

    public function init() {
        $this->i = "True";
    }
}

/*class get {
    static public function create ($item) {
         тут можно вызывать сколько угодно методов данного объекта
          для необходимой задачи. И тогда, когда вызываем всеголишь
          один метод $object =  get::create("parametr") то у нас создается объект return new Keyboard();
         вызываются требуемые методы и данный объект возвращается
        return new Keyboard();
    }
}

$object = get::create("parametr");

echo "<pre>";
var_dump($object);
echo "</pre>"; */