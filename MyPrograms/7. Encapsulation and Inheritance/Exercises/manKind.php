<?php

class Human
{
    private $firstName;
    private $lastName;

    /**
     * Human constructor.
     * @param $firstName
     * @param $lastName
     * @throws Exception
     */
    public function __construct($firstName, $lastName)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @throws Exception
     */
    protected function setFirstName(string $firstName)
    {
        if (!ctype_upper($firstName[0])) {
            throw new Exception("Expected upper case letter!Argument: firstName");
        }
        if (strlen($firstName) < 4) {
            throw new Exception("Expected length at least 4 symbols!Argument: firstName");
        }
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @throws Exception
     */
    protected function setLastName(string $lastName)
    {
        if (!ctype_upper($lastName[0])) {
            throw new Exception("Expected upper case letter!Argument: lastName");
        }
        if (strlen($lastName) < 3) {
            throw new Exception("Expected length at least 3 symbols!Argument: lastName");
        }
        $this->lastName = $lastName;
    }

    public function __toString()
    {
        return "First Name: " . $this->getFirstName() . PHP_EOL . "Last Name: " . $this->getLastName() . PHP_EOL;
    }
}

class Student extends Human
{
    private $facultyNum;

    public function __construct(string $firstName, string $lastName, string $facultyNum)
    {
        parent::__construct($firstName, $lastName);
        $this->setFacultyNum($facultyNum);
    }

    /**
     * @return mixed
     */
    public function getFacultyNum()
    {
        return $this->facultyNum;
    }

    /**
     * @param string $facultyNum
     * @throws Exception
     */
    public function setFacultyNum(string $facultyNum)
    {
        if (is_numeric($facultyNum)) {
            if (strlen($facultyNum) < 5 || strlen($facultyNum) > 10) {
                throw new Exception("Invalid faculty number!");
            }
        }
        $this->facultyNum = $facultyNum;
    }

    public function __toString()
    {
        return parent::__tostring()
            . "Faculty number: " . $this->getFacultyNum() . PHP_EOL;
    }
}

class Workers extends Human
{
    private $weeklySalary;
    private $workingHours;
    private $hoursRate;

    /**
     * Workers constructor.
     * @param $weeklySalary
     * @param $workingHours
     * @param string $firstName
     * @param string $lastName
     * @throws Exception
     */
    public function __construct(string $firstName, string $lastName, float $weeklySalary, float $workingHours)
    {
        parent::__construct($firstName, $lastName);
        $this->setWeeklySalary($weeklySalary);
        $this->setWorkingHours($workingHours);
        $this->setHoursRate();
    }

    /**
     * @param string $lastName
     * @throws Exception
     */
    protected function setLastName(string $lastName)
    {
        if (strlen($lastName) <= 3) {
            throw new Exception("Expected length more than 3 symbols!Argument: lastName");
        }
        parent::setLastName($lastName);
    }

    /**
     * @return mixed
     */
    public function getWeeklySalary()
    {
        return number_format($this->weeklySalary, 2, ".", "");
    }

    /**
     * @param float $weeklySalary
     * @throws Exception
     */
    protected function setWeeklySalary(float $weeklySalary)
    {
        if ($weeklySalary <= 10) {
            throw new Exception("Expected value mismatch!Argument: weekSalary");
        }
        $this->weeklySalary = $weeklySalary;
    }

    /**
     * @return mixed
     */
    public function getWorkingHours()
    {
        return number_format($this->workingHours, 2, ".", "");
    }

    /**
     * @param float $workingHours
     * @throws Exception
     */
    protected function setWorkingHours(float $workingHours)
    {
        if ($workingHours < 1 || $workingHours > 12) {
            throw new Exception("Expected value mismatch!Argument: workHoursPerDay");
        }
        $this->workingHours = $workingHours;
    }

    /**
     * @return mixed
     */
    public function getHoursRate()
    {
        return number_format($this->hoursRate, 2, ".", "");
    }

    protected function setHoursRate()
    {
        $weekDays = 7;
        $output = $this->weeklySalary / ($weekDays * $this->workingHours);
        $this->hoursRate = $output;
    }

    public function __toString()
    {
        return parent::__tostring() . "Week Salary: " . $this->getWeeklySalary() . PHP_EOL . "Hours per day: " .
            $this->getWorkingHours() . PHP_EOL . "Salary per hour: " . $this->getHoursRate() . PHP_EOL;
    }
}

try {
    list($studentFN, $studentLN, $facultyNum) = explode(" ", readline());
    $student = new Student($studentFN, $studentLN, $facultyNum);
    list($workerFN, $workerLN, $salary, $workingHours) = explode(" ", readline());
    $worker = new Workers($workerFN, $workerLN, $salary, $workingHours);

    echo $student . PHP_EOL;
    echo $worker . PHP_EOL;

} catch (Exception $exception) {
    echo $exception->getMessage();
}