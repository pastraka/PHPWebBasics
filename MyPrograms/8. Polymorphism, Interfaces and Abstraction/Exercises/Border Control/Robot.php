<?php


class Robot implements Control
{
    private $name;
    private $id;

    /**
     * Robot constructor.
     * @param $name
     * @param $id
     */
    public function __construct($name, $id)
    {
        $this->setName($name);
        $this->setId($id);
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}