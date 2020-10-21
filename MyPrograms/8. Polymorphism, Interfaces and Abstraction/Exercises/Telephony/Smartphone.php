<?php

require_once "Phone.php";

class Smartphone implements Phone
{
    /**
     * @param string $numbers
     * @return string
     * @throws Exception
     */
    public function setCalling(string $numbers): string
    {
        //if it is not a string of numbers
        if (!is_numeric($numbers)) {
            throw new Exception("Invalid number!");
        }
        return "Calling... " . $numbers;
    }

    /**
     * @param string $urls
     * @return string
     * @throws Exception
     */
    public function setUrls(string $urls): string
    {
        //If the string contains a digit
        if (preg_match("~[0-9]~", $urls)) {
            throw new Exception("Invalid URL!");
        }
        return "Browsing: " . $urls . "!";
    }
}

$number = explode(" ", readline());
$url = explode(" ", readline());
$phone = new Smartphone();

foreach ($number as $num) {
    try {
        echo $phone->setCalling($num) . PHP_EOL;
    } catch (Exception  $exception) {
        echo $exception->getMessage() . PHP_EOL;
    }
}

foreach ($url as $sites) {
    try {
        echo $phone->setUrls($sites) . PHP_EOL;
    } catch (Exception $e) {
        echo $e->getMessage() . PHP_EOL;
    }
}