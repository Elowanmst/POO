<?php

namespace Classes\Provisions; 

class Cola extends Provisions {

    public function __construct()
    {
        $this->icon = '🥤';
        $this->name = 'Cola';
        $this->healthPoints = '-10';
        $this->moodPoints = '10';
        $this->hungerPoints = '0';
        $this->thirstPoints ='-30' ;

    }
}

