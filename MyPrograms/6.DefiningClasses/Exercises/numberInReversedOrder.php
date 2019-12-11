<?php

class DecimalNumber
{
    /**
     * @var string
     */
    private string $num;

    /**
     * DecimalNumber constructor.
     * @param $num
     */
    public function __construct($num)
    {
        $this->num = $num;
    }

    /**
     * @return mixed
     */
    public function getNum()
    {
        return $this->num;
    }

    function reverse()
    {
        return $num = strrev($this->getNum());
    }
}

$input = readline();
$num = new DecimalNumber($input);
echo $num->reverse();