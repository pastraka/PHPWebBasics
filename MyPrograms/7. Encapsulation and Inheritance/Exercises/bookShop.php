<?php

class Book
{
    private $title;
    private $author;
    private $price;

    /**
     * Book constructor.
     * @param string $title
     * @param array $author
     * @param float $price
     */
    public function __construct(string $title, array $author, float $price)
    {
        $this->setPrice($price);
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price)
    {
        $this->price = $price;
    }

    public function __toString()
    {
        return "OK" . PHP_EOL . $this->getPrice();
    }
}

class GoldenEdition extends Book
{
    public function getPrice()
    {
        return parent::getPrice() * 1.3;
    }
}

try {
    $author = explode(" ", readline());
    $bookName = readline();
    $bookPrice = floatval(readline());
    $bookType = readline();
    $book = "";

    if (is_numeric(substr($author[1], 0, 1))) {
        throw new Exception("Author not valid!");
    }
    if (strlen(strlen($bookName) < 3)) {
        throw new Exception("Title not valid!");
    }
    if ($bookPrice <= 0) {
        throw  new Exception("Price not valid!");
    }
    if ($bookType != "GOLD" && $bookType != "STANDARD") {
        throw new Exception("Type is not valid!");
    }
    if ($bookType == "GOLD") {
        $book = new GoldenEdition($bookName, $author, $bookPrice);
    } elseif ($bookType == "STANDARD") {
        $book = new Book($bookName, $author, $bookPrice);
    }
    echo $book;

} catch (Exception $e) {
    echo $e->getMessage();
}