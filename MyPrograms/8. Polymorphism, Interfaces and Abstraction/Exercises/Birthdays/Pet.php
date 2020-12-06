<?php


class Pet implements Birthday
{
    private $name;
    private $birthdate;

    /**
     * Pet constructor.
     * @param $name
     * @param $birthdate
     */
    public function __construct($name, $birthdate)
    {
        $this->setName($name);
        $this->setBirthdate($birthdate);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * @param mixed $birthdate
     */
    public function setBirthdate($birthdate): void
    {
        $this->birthdate = $birthdate;
    }
}