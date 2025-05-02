<?php

spl_autoload_register(function($className) {

    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $filename = str_replace('Classes/', __DIR__ . '/Classes/', $className) . '.php';

    if (file_exists($filename)) {
        require $filename;
    }
});
session_start();

use Classes\Game;
use Classes\Animal\Animal;
use Classes\Provisions\Provision;
use Classes\Provisions\Watermelon;
use Classes\Provisions\Burger;
use Classes\Provisions\Cola;    
use Classes\Provisions\Salade;
use Classes\Provisions\Water;
use Classes\Provisions\Sacrifice;
use Classes\Provisions\CureDesintoxe;




$game = $_SESSION['game'] ?? Game::getInstance(); //recuperer game en session ou creer une nouvelle instance


if (isset($_POST['action'])){

    switch ($_POST['action']){

        case 'createAnimal':

            $animal = new Animal($_POST['icon'], $_POST['name']);
            $game->addAnimal($animal);

            break;

        case 'reset':
            $game = null;
            break;

        case 'night':
            $game->night();
            break;

        case 'provisions':

            $game->provisions();
            break;

        case 'consomer':
            $game->consommer();
            break;

        case 'sacrifier':
            $game->sacrifier();
            break;

        case 'caresser':
            $game->caresser();
            break;
        
        case 'soigner':
            $game->soigner();
            break;
    }


   

  

    header('location: index.php'); //redirection

} else {
    require ('interface.php');
    $game->clearMessages();
}

$_SESSION['game'] = $game; //sauvegarde en session






