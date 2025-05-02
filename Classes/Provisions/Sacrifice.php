<?php

namespace Classes\Provisions;

class Sacrifice
{
    public function applySacrifice($hungryAnimal, $sacrificedAnimal)
    {

        if ($hungryAnimal->isDead() || $sacrificedAnimal->isDead()) {
            return "Erreur : l'un des animaux est déjà mort.";
        }

        // L'animal sacrifié meurt
        $sacrificedAnimal->changeHealth(-100);

        // L'animal affamé voit toutes ses stats augmenter au maximum
        $hungryAnimal->changeHealth(100);
        $hungryAnimal->changeMood(100);
        $hungryAnimal->changeHunger(-100);
        $hungryAnimal->changeThirst(-100);
        $hungryAnimal->changeAddiction(50);

        return "{$hungryAnimal->getName()} a mangé {$sacrificedAnimal->getName()} !";
    }
}