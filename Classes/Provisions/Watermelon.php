<?php

namespace Classes\Provisions; 

class Watermelon extends Provision {

    public function __construct()
    {
        $this->icon = '🍉';
        $this->name = 'Pasteque';
      
        $this->hungerPoints = '-20';
        $this->thirstPoints ='-30' ;
        
        
    }
}

