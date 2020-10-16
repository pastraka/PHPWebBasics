<?php

class Number
{
    /**
     * @var int
     */
    private int $num;

    /**
     * Number constructor.
     * @param $num
     */
    public function __construct(int $num)
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

    function name()
    {
        $num = substr($this->getNum(), -1); // => substr($this->getnum(), -1) === $this->getnum() % 10

        switch ($num) {
            case 0: return "zero"; break;
            case 1: return "one"; break;
            case 2: return "two"; break;
            case 3: return "three"; break;
            case 4: return "four"; break;
            case 5: return "five"; break;
            case 6: return "six"; break;
            case 7: return "seven"; break;
            case 8: return "eight"; break;
            default: return "nine"; break;
        }
    }
}

$input = readline();
$num = new Number($input);
echo $num->name() . PHP_EOL;
