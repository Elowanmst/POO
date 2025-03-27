<?php

namespace Classes\Provisions; 

class Water extends Provisions {

    public function __construct()
    {
        $this->icon = '🍺';
        $this->name = 'Water';
        $this->healthPoints = '-40';
    
        $this->thirstPoints ='-20' ;

    }
}

