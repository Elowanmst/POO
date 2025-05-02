<?php

namespace Classes\Provisions; 

class Water extends Provision {

    public function __construct()
    {
        $this->icon = '🍺';
        $this->name = 'Water';
        $this->healthPoints = '30';
        $this->addictionPoints = '50';
        $this->thirstPoints ='-20' ;
        $this->addictionPoints = '0';

    }
}

