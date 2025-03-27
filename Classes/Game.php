<?php

namespace Classes; 

class Game{
    private $points = 3;
    private $days = 1;

    private $animals = [];
    private $provisions= [];
    
    private static $instance = null;

    private function __construct() {}

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function night() 
    {
        $this->days++;
        $this->points = 3;

        foreach ($this->animals as $id => $animal) {
            $animal->sleep();
        }
    }
}



