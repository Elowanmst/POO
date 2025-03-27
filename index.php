<?php

spl_autoload_register(function($className) {

    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $filename = str_replace('Classes/', __DIR__ . '/Classes/', $className) . '.php';

    if (file_exists($filename)) {
        require $filename;
    }
});

use Classes\Game;

$game = Game::getInstance();




echo '<pre>';
print_r($game);
echo '</pre>';