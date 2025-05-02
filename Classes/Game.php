<?php

namespace Classes; 

use Classes\Animal\Animal;
use Classes\Provisions\Burger;
use Classes\Provisions\Cola;
use Classes\Provisions\Salade;
use Classes\Provisions\Water;
use Classes\Provisions\Watermelon;
use Classes\Provisions\Provision;
use Classes\Provisions\Sacrifice;
use Classes\Provisions\CureDesintoxe;


class Game{
    private $points = 3;
    private $days = 1;

    private $animals = [];
    private $provisions= [];

    private $messages = [];
    
    private static $instance = null;

    private function __construct() {}

    public function __wakeup()
    {
        self::$instance = $this;
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }


    
    public function addAnimal(Animal $animal)
    {
        if ($this->consumePoints(1)) {
        $this->animals[] = $animal;
        }
        $this->addMessages("{$animal->getName()} est né !");

        return false;
    }

    public function addProvisions($provision)
    {
        if ($provision === null) {
            $this->addMessages("Erreur : provision invalide !");
            return;
        }

        if ($this->consumePoints(1)) {
            $this->provisions[] = $provision;
            $this->addMessages("{$provision->getName()} à été ajouté à l'inventaire !");
        }
    }


    public function getAnimal()
    {
        return $this->animals;
    
    }

    public function getProvisions()
    {
        return $this->provisions;
    }

  

    public function night() 
    {
        $this->days++;
        $this->points = 3;

        foreach ($this->animals as $id => $animal) {
            $animal->sleep();
        }
        $this->addMessages("La nuit est passée, les animaux se reveillent");
    }

    public function provisions()
    {
        $random = rand(0, 100);

            if ($random >= 0 && $random <= 20) {
                $provision = new Watermelon;
            } elseif ($random >= 21 && $random <= 45) {
                $provision = new Burger;
            } elseif ($random >= 46 && $random <= 65){
                $provision = new Cola;
            } elseif ($random >= 66 && $random <= 75){
                $provision = new Water;
            } elseif ($random >= 76 && $random <= 90){
                $provision = new Salade;
            }elseif ($random >= 91 && $random <= 100){
                $provision = new CureDesintoxe;
            }

            $this->addProvisions($provision);
    }

    public function consommer()
    {

         if ($this->consumePoints(1)) {
            $animal = $this->getAnimal()[$_POST['animal']];
            $provision = $this->getProvisions()[$_POST['provision']];
    
            $animal->consume($provision);
            unset($this->provisions[$_POST['provision']]);
        }

    }

    public function sacrifier()
    {
        $hungryAnimal = $this->getAnimal()[$_POST['animal']];
        $sacrificedAnimal = $this->getAnimal()[$_POST['sacrificedAnimal']];

        if ($this->consumePoints(2)) {
            $sacrifice = new Sacrifice();
            $message = $sacrifice->applySacrifice($hungryAnimal, $sacrificedAnimal);
            $this->addMessages($message);
        }
    }


    public function caresser()
    {
        $animalIndex = $_POST['animal'];

        if ($this->consumePoints(1)) {
            $animal = $this->animals[$animalIndex];
            $animal->changeMood(15);
            $this->addMessages("Vous avez caressé {$animal->getName()} ! Il est content.");
        }
    }

    public function soigner()
    {
        $animalIndex = $_POST['animal'];

        if ($this->consumePoints(1)) {
            $animal = $this->animals[$animalIndex];
            $animal->changeHealth(25);
            $this->addMessages("Vous avez soigné {$animal->getName()} ! Il va mieux.");
        }
    }


    private function consumePoints($points)
    {
    if ($this->points >= $points){
        $this->points -= $points;

        return true;
    }

    $this->addMessages("Vous n'avez pas assez de points !");

    return false;
}

public function addMessages($message)
{
    $this->messages[] = $message;
}   

public function getMessages()
{
    return $this->messages;
}
public function clearMessages()
{
    $this->messages = [];
}
public function getPoints()
{
    return $this->points;
}



}


