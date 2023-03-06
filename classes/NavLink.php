<?php 

class NavLink{
    public $text;
    public $key;
    public $url;

    function __construct($text,$key,$url="#")
    {
        $this->text = $text;
        $this->key = $key;
        $this->url = $url;
    }
}

?>