<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 24.11.17
 * Time: 12:30
 */

namespace andtesting\src;


class magic
{

    private $state;

    public function __construct(int $state)
    {
        $this->state = $state;
        //echo 'hello andr';
    }

    public function add(int $num) : int {
        return $this->state +$num;
    }

}