<?php

class Box
{
    /**
     * @var float
     */
    private $length;

    /**
     * @var float
     */
    private $width;

    /**
     * @var float
     */
    private $height;

    /**
     * Box&DataValidation constructor.
     * @param float $length
     * @param float $width
     * @param float $height
     * @throws Exception
     */

    public function __construct(float $length, float $width, float $height)
    {
        $this->setLength($length);
        $this->setWidth($width);
        $this->setHeight($height);
    }

    /**
     * @return float
     */
    public function getLength(): float
    {
        return $this->length;
    }

    /**
     * @param float $length
     * @throws Exception
     */
    private function setLength(float $length): void
    {
        if ($length <= 0) {
            throw new Exception("Length cannot be zero or negative.");
        } else {
            $this->length = $length;
        }
    }

    /**
     * @return float
     */
    public function getWidth(): float
    {
        return $this->width;
    }

    /**
     * @param float $width
     * @throws Exception
     */
    private function setWidth(float $width): void
    {
        if ($width <= 0) {
            throw new Exception("Width cannot be zero or negative.");
        } else {
            $this->width = $width;
        }
    }

    /**
     * @return float
     */
    public function getHeight(): float
    {
        return $this->height;
    }

    /**
     * @param float $height
     * @throws Exception
     */
    private function setHeight(float $height): void
    {
        if ($height <= 0) {
            throw new Exception("Height cannot be zero or negative.");
        } else {
            $this->height = $height;
        }
    }

    /**
     * @return float
     */
    private function getVolume(): float
    {
        return $this->getLength() * $this->getWidth() * $this->getHeight();
    }

    /**
     * @return float
     */
    private function getLateralSurfaceArea(): float
    {
        return 2 * ($this->getLength() * $this->getHeight())
            + 2 * ($this->getWidth() * $this->getHeight());
    }

    /**
     * @return float
     */
    private function getServiceArea(): float
    {
        return 2 * ($this->getLength() * $this->getWidth())
            + 2 * ($this->getLength() * $this->getHeight())
            + 2 * ($this->getWidth() * $this->getHeight());
    }

    public function __toString()
    {
        $volume = number_format($this->getVolume(), 2, '.', '');
        $surfaceArea = number_format($this->getServiceArea(), 2, '.', '');
        $lateralSurfaceArea = number_format($this->getLateralSurfaceArea(), 2, '.', '');

        return "Surface Area - {$surfaceArea}\nLateral Surface Area - {$lateralSurfaceArea}\nVolume - {$volume}";
    }
}

$length = floatval(readline());
$width = floatval(readline());
$height = floatval(readline());

try {
    $box = new Box($length, $width, $height);
    echo $box;
} catch (Exception $e) {
    echo $e->getMessage();
}