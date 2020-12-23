<?php

class Mug
{
    private string $color;
    private string $shape;
    private int $price;

    public function __construct($color, $shape, $price)
    {
        $this->setColor($color);
        $this->setShape($shape);
        $this->setPrice($price);
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function getShape()
    {
        return $this->shape;
    }

    public function setShape($shape)
    {
        $this->shape = $shape;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }
}
