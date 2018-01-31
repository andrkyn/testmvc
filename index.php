<?php

function __autoload($class_name) {
    require_once $class_name . '.php';
}



$products = new Products();
echo '<pre>';
var_dump($products->getAllProducts());
echo '</pre>';

