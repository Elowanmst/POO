<?php

namespace Classes\Provisions; 

class Burger extends Provisions 
{
    public function __construct()
    {
        $this->icon = '🍔';
        $this->name = 'Burger';
        $this->healthPoints = '-10';
        $this->moodPoints = '20';
        $this->hungerPoints = '-100';
        $this->thirstPoints ='30';
    }
}