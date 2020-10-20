<?php

include 'helpers.php';


class Animal
{
    public $name;
    public $health;
    public $hunger;
    public $water_need; // La soif
    public $mood;
    protected $actions = 3;
    public $yo; // L'âge (Year old)
    private $night = false;
    private $foods = array(0 => array('name' => 'Melon', 'water' => -30, 'food' => -20, 'health' => 0, 'mood' => 0), 1 => array('name' => 'Burger', 'water' => +30, 'food' => -100, 'health' => -10, 'mood' => 0), 2 => array('name' => 'Coca', 'water' => -10, 'food' => 0, 'health' => 0, 'mood' => -30), 3 => array('name' => 'Water', 'water' => -40, 'food' => 0, 'health' => 0, 'mood' => -20));
    private $die = false;
    public $make_baby = false;

    public function __construct($name, $health, $hunger, $water_need, $mood, $yo)
    {
        $this->name = $name;
        $this->health = $health;
        $this->hunger = $hunger;
        $this->water_need = $water_need;
        $this->mood = $mood;
        $this->yo = $yo;
    }

    public function health_evolve()
    {
        if ($this->hunger >= 100) {
            $this->health -= rand(10, 30);
        }
        if ($this->water_need >= 100) {
            $this->health -= rand(10, 30);
        }
        if ($this->mood <= 0) {
            $this->health -= rand(0, 20);
        }

        if ($this->health <= 0) {
            $this->die = true;
            $this->health = 0;
        }

        if ($this->yo < 10) {
            $luck = rand(1, 5);
            if ($luck == 5) {
                $this->make_baby = true;
            }
        }
    }

    public function what_food()
    {
        $food_num = rand(0, 4);
        
        if ($food_num == 4) {
            return false;
        } else {
            return $this->foods[$food_num];
        }
    }

    private function another_day()
    {
        if ($this->actions == 0) {
            $this->night = true;
            $this->yo += 1;
            $this->actions = 3;
            $this->hunger += rand(5, 15);
            $this->water_need += rand(5, 15);
            $mood_array = array(0 => 80, 1 => -80);
            $this->mood = $mood_array[rand(0, 1)];
            $this->health_evolve();
        }
    }

    private function enought_actions()
    {
        if ($this->actions < 0) {
            $this->actions = 0;
        }
        if ($this->actions > 0) {
            return true;
        } else {
            $this->another_day();
        }
    }

    private function change_mood()
    {
        if ($this->mood < 100) {
            $this->mood = rand(0, 30);
        } elseif ($this->mood > 100) {
            $this->mood = 100;
        }
    }

    private function change_health()
    {
        if ($this->health < 100) {
            $this->health = rand(20, 100);
        } elseif ($this->health > 100) {
            $this->health = 100;
        }
    }



    public function be_kind() // Caresser
    {
        $this->actions -= 2;
        if ($this->enought_actions()) {
            $this->change_mood();
        }
    }

    public function heal()
    {
        $this->actions -= 0;
        if ($this->enought_actions()) {
            $this->change_health();
        }
    }

    public function feed()
    {
        $this->actions -= 2;
        if ($this->enought_actions()) {
            $food = $this->what_food();
            $this->water_need = $food->water;
            $this->hunger = $food->food;
            $this->mood = $food->mood;
            $this->mood = $food->mood;
            $this->health = $food->health;
            echo $food->name;
        }
    }

    public function get_actions_num()
    {
        return $this->actions;
    }

    public function get_yo()
    {
        return $this->yo;
    }

    public function get_die()
    {
        return $this->die;
    }


    public function is_night()
    {
        return $this->night;
    }
}
