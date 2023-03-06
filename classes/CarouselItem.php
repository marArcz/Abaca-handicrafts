<?php

declare(strict_types=1);

class CarouselItem
{
    public $title;
    public $description;
    public $image;
    public $url;
    private $dummy_description = "Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit, Sed Do Eiuiana Smod Tempor Ut Labore Et Dolore Magna Aliqua. Ut Enim Ad Minim Veniam, Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip.";

    function __construct(String $title, String $image, String $description = null, String $url = "#")
    {
        $this->title = $title;
        $this->description = $description ? $description : $this->dummy_description;
        $this->image = $image;
        $this->url = $url;
    }
}
