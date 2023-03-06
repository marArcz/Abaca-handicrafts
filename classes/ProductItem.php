<?php

declare(strict_types=1);

class ProductItem
{
    public $name;
    public $price;
    public $image;

    function __construct($name,$price,$image)
    {   
        $this->name = $name;
        $this->price = $price;
        $this->image = $image;
    }
}

?>
