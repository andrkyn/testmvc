<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 01.02.18
 * Time: 16:48
 */
class Mouse implements ProductInterface
{
    protected $_id;
    protected $_model;
    protected $_price;

    public function __construct($product)
    {
        $this->_id =$product['id'];
        $this->_model =$product['model'];
        $this->_price =$product['price'];
    }

    function getId()
    {
        return $this->_id;
    }

    function getModel()
    {
        return $this->_model;
    }

    function getPrice()
    {
        return $this->_price;
    }

    function getType()
    {
        return 'mouse';
    }
}
