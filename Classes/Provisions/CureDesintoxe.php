<?php

namespace Classes\Provisions; 

class CureDesintoxe extends Provision {

    public function __construct()
    {
        $this->icon = '💊';
        $this->name = 'Desintoxe';
        $this->healthPoints = '0';
        $this->moodPoints = '0';
        $this->hungerPoints = '0';
        $this->thirstPoints ='0' ;
        $this->addictionPoints = '-100';
    }
}