<?php

class Car {
    public $Id;
    public $License;
    public $Color;
    public $Brand;
    public $Model;
    public $Year;
    public $Image;
    private $UserId;

    public function __construct() {
    }

    public function getUserId() {
        return $this->UserId;
    }
}

?>
