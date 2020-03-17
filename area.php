<?php

class rectangle
{
    protected $length;
    protected $width;

    public function __construct($length = 0, $width = 0)
    {
        $this->length = (is_numeric($length) and $length >= 0) ? $length : 0;
        $this->width = (is_numeric($width) and $width >= 0) ? $width : 0;
        echo "rectangle ini with ($this->length, $this->width).\n";
    }

    public function area()
    {
        return $this->length * $this->width;
    }
}

class square extends rectangle
{
    public function __construct($sideLength = 0)
    {
        if (is_numeric($sideLength) and $sideLength >= 0) {
            $this->length = $sideLength;
            $this->width = $sideLength;
        }
        echo "square ini with ($this->length, $this->width).\n";
    }
}

// main
$rec = new rectangle($argv[1], $argv[2]);
echo "rectangle area is " . $rec->area() . ".\n";
$squ = new square($argv[1]);
echo "square area is " . $squ->area() . ".\n";
