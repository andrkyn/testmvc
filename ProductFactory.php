<?php

class ProductFactory
{
    private $_types =array();

    public function __construct()
    {
        $this->_types =array(
            'keyboard'=>'Keyboard', //имена классов будут совпадать
            'mouse'   => 'Mouse'
        );
    }

    public function make($product)
    {
        if (!array_key_exists($product['type'], $this->_types)) {
            throw new InvalidArgumentException("Тип {$product['type']} not found.");
        }
        $className = $this->_types[$product['type']];
        return new $className($product);
    }
}