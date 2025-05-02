<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game</title>
    <link rel="stylesheet" href="Classes/css/style.css">
 
</head>


<body>
<div class="top-controls">

    <div class="left-buttons">
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="provisions">
            <button type="submit" class="button-left">Roulette à provisions</button>
        </form>

        <form action="index.php" method="post">
            <input type="hidden" name="action" value="night">
            <button type="submit" class="button-left">Au dodo</button>
        </form>
    </div>


<div class="create-form">
    <form action="index.php" method="post">
    <input type="hidden" name="action" value="createAnimal">
    <input type="text" name="name" placeholder="Nom de l'animal">
    <select name="icon">
        <option>🐶</option>
        <option>🐱</option>
        <option>🐸</option>
        <option>🐮</option>
        <option>🦉</option>
        <option>🦟</option>
        <option>🐝</option>
        <option>🐙</option>
        <option>🦧</option>
        <option>🦆</option>
        <option>🫎</option>
        <option>🐌</option>
        <option>🦬</option>
        <option>🐳</option>
        <option>🦦</option>
    </select>

    <button type="submit">CREATE</button> 
    </form>
</div>



    
<div class="right-buttons">    
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="reset">
        <button type="submit" class="button-right">Reset</button>
    </form>
    <div class="points">
        <p>Points restants : <?= $game->getPoints() ?></p>
    </div>
</div>
</div>

    <?php foreach ($game->getMessages() as $messages) : ?>
        <div class="message">
            <?= $messages ?>
        </div>
        <?php endforeach ?>
        
        
    

    <div class="animal-container">
        <?php foreach ($game->getAnimal() as $index => $animal) : ?>
        
            <div class="animal-card" >
                <div class="icon"><?= $animal->getIcon() ?></div>
                <div class="name"><?= $animal->getName() ?></div>
            
                <div class="age"><?= $animal->getAge() ?> ans</div>
                <div class="stats">
                    <p>Santé : <?= $animal->getHealth() ?></p>
                    <p>Humeur : <?= $animal->getMood() ?></p>
                    <p>Faim : <?= $animal->getHunger() ?></p>
                    <p>Soif : <?= $animal->getThirst() ?></p>
                    <p>Addiction : <?= $animal->getAddiction() ?></p>
                </div>
        
                <div class="animal-action">
                    <?php if ($animal->isDead()) : ?>
                        <div class="dead-icon">⚰️ RIP ⚰️</div>
                    <?php else : ?>
                        <form class="provision" action="index.php" method="post">
                            <input type="hidden" name="action" value="consomer">
                            <input type="hidden" name="animal" value="<?= $index ?>">
                            <select class="provisions" name="provision">
                                <?php foreach ($game->getProvisions() as $provisionIndex => $provision) : ?>
                                    <?php if ($provision !== null) : ?>
                                    <option value="<?= $provisionIndex ?>"><?= $provision->getIcon() ?></option>
                                    <?php endif; ?>
                                <?php endforeach ?>
                            </select>
                            <button class="bouton-provisions" type="submit">Manger</button>
                        </form>


                        <form class="provision" action="index.php" method="post">
                            <input type="hidden" name="action" value="sacrifier">
                            <input type="hidden" name="animal" value="<?= $index ?>">
                            <select class="provisions" name="sacrificedAnimal">
                                <?php foreach ($game->getAnimal() as $sacrificedIndex => $sacrificedAnimal) : ?>
                                    <?php if (!$sacrificedAnimal->isDead() && $sacrificedIndex !== $index) : ?>
                                        <option value="<?= $sacrificedIndex ?>"><?= $sacrificedAnimal->getIcon() ?> <?= $sacrificedAnimal->getName() ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <button class="bouton-provisions" type="submit">J'ai faim</button>
                        </form>

                        <form class="provision" action="index.php" method="post">
                            <input type="hidden" name="action" value="caresser">
                            <input type="hidden" name="animal" value="<?= $index ?>">
                            <button class="provisions" type="submit">Caresser</button>

                            <input type="hidden" name="action" value="soigner">
                            <input type="hidden" name="animal" value="<?= $index ?>">
                            <button class="bouton-caresser" type="submit">soigner</button>
                        </form>
                    <?php endif; ?>
                </div>
                
    
            </div>  
        <?php endforeach ?>
    </div>
    

       
       
        <div class="provision-container">

        <?php foreach ($game->getProvisions() as $provision) : ?>
            <?php if ($provision !== null) : ?>

                <div class="provision-card" >
                    <div class="icon"><?= $provision->getIcon() ?></div>
                    <div class="name"><?= $provision->getName() ?></div>
                
                    <div class="stats">
                            <p>Points de santé : <?= $provision->getHealthPoints() ?></p>
                            <p>Points d'humeur : <?= $provision->getMoodPoints() ?></p>
                            <p>Points de faim : <?= $provision->getHungerPoints() ?></p>
                            <p>Points de soif : <?= $provision->getThirstPoints() ?></p>
                            <p>Points d'addiction : <?= $provision->getAddictionPoints() ?></p>
                    </div>
                
                </div>
            <?php endif; ?>
        <?php endforeach ?>
        </div>  
        




        

        




    <pre>  
        <?php print_r($game); ?> 
    </pre> 

        

</body>
</html>