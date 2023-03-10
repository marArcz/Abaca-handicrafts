<?php 

class NavLink{
    public $text;
    public $key;
    public $icon;
    public $url;

    function __construct($text,$key,$url="#",$icon="")
    {
        $this->text = $text;
        $this->key = $key;
        $this->url = $url;
        $this->icon = $icon;
    }
}

?>