<?php

class Baby extends Animal
{
    public $name;
    public $health;
    public $hunger;
    public $yo; // L'âge (Year old)
    public $die = false;

    public function __construct($name, $health, $hunger, $yo)
    {
        $this->name = $name;
        $this->health = $health;
        $this->hunger = $hunger;
        $this->yo = $yo;
    }
}
