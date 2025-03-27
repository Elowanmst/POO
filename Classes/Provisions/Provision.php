<?php

namespace Classes\Provisions;

abstract class Provisions
{
    protected $icon;
    protected $name;

    protected $healthPoints = 0; 
    protected $moodPoints = 0;
    protected $hungerPoints = 0;
    protected $thirstPoints = 0;

    public function getIcon()
    { 
        return $this->icon;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getHealthPoints()
    {
        return $this->healthPoints;
    }

    public function getMoodPoints()
    {
        return $this->moodPoints;
    }

    public function getHungerPoints()
    {
        return $this->hungerPoints;
    }

    public function getThirstPoints()
    {
        return $this->thirstPoints;
    }

}
