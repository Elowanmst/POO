<?php

namespace Classes\Animal;

use Classes\Game;
use Classes\Provisions\Provision;

class Animal 
{
    private $icon;
    private $name;
    private $age = 0;

    private $health = 100;
    private $mood = 100;
    private $hunger = 50;
    private $thirst = 50;
    private $addiction = 0;
    
    public function __construct($icon, $name) 
    {
        $this->icon = $icon;
        $this->name = $name;
    }

    public function consume(Provision $provision)
    {

        if ($provision instanceof \Classes\Provisions\Salade) {
            $this->saladeConsumed = true;
            if ($this->addiction >= 100) {
                $this->addiction = 100;
                Game::getInstance()->addMessages("{$this->name} est addicte, il doit en manger une au moins une fois par jour");
                return;
            }
        }

        $this->changeHealth($provision->getHealthPoints());
        $this->changeMood($provision->getMoodPoints());
        $this->changeHunger($provision->getHungerPoints());
        $this->changeThirst($provision->getThirstPoints());
        $this->changeAddiction($provision->getAddictionPoints());
    }

    public function isDead()
    {
        return $this->health == 0;
    }

    public function getName () 
    {
        return $this->name;
    }
    public function getIcon ()
    {
        return $this->icon;
    }
    public function getAge ()
    {
        return $this->age;
    }
    public function getHealth ()
    {
        return $this->health;
    }
    public function getMood ()
    {
        return $this->mood;
    }
    public function getHunger ()
    {
        return $this->hunger;
    }
    public function getThirst ()
    {
        return $this->thirst;
    }
    public function getAddiction()
    {
        return $this->addiction;
    }

    public function changeHealth ($points)
    {
        

        $this->health += $points;
        if( $this->health > 100)
        {
            $this->health = 100;
        }
        else if ($this->health < 0)
        { 
            $this->health = 0;
        }
    }

    public function changeMood ($points)
    {
        $this->mood += $points;
        if ($this->mood > 100)
        {
            $this->mood = 100;
        }
        else if ($this->mood < 0)
        {
            $this->mood = 0;
        }
    }

    public function changeHunger ($points)
    {
        $game = Game::getInstance();
        $game->addMessages("{$this->name} : {$points} points de faim");


        $this->hunger += $points;
        if ($this->hunger > 100)
        {
            $this->hunger = 100;
        }
        else if ($this->hunger < 0)
        {
            $this->hunger = 0;
        }
    }

    public function changeThirst ($points)
    {
        $this->thirst += $points;
        if ($this->thirst > 100)
        {
            $this->thirst = 100;
        }
        else if ($this->thirst < 0)
        {
            $this->thirst = 0;
        }
    }

    public function changeAddiction($points)
    {
        $this->addiction += $points;

        if ($this->addiction > 100) {
            $this->addiction = 100;
        } elseif ($this->addiction < 0) {
            $this->addiction = 0;
        }
    }


    public function sleep()
    {
        
        if (! $this->isDead()) {

            $this->age++;
            $this->changeHunger(rand(5, 15));
            $this->changeThirst(rand(5, 15));
            $this->changeMood(rand(-80, 80));
            if ($this->hunger >= 100)
            {
                $this->changeHealth(rand(-30, -10));
            }
            if ($this->thirst >=100)
            {
                $this->changeHealth(rand(-30, -10));
            }
            if ($this->mood <= 0)
            {
                $this->changeHealth(rand(-20, 0));
            }
            
            if ($this->addiction >= 100 && !$this->saladeConsumed) {
                $this->changeHealth(-30);
            }
            $this->saladeConsumed = false;
            
            // if ($this->health <= 0)
            // {
            //     $this->changeHealth = "mort, decédé, RIP, au trous";
            // }
        }
    }


   


    
    


}