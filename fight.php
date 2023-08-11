<?php
require_once __DIR__ . '/config/db.php';
require_once __DIR__ . '/config/autoload.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - TP Jeu de combat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<?php

$heroesManager = new HeroesManager($db); // Instanciation d'un nouveau HeroesManager avec connexion à la base de données $db
$hero = $heroesManager->find($_GET['hero_id']); // Instanciation d'un héros spécifique en utilisant la méthode 'find' de HeroesManager en utilisant l'ID

// Démarrage du fight
$fightManager = new FightsManager(); // Instanciation d'un nouveau FightsManager -> on va créer un monstre et lancer un combat
$monster = $fightManager->createMonster('Freezer'); // Création d'un monstre 'Freezer' en utilisant la méthode 'createMonster' de FightsManager
$fightHistory = $fightManager->fight($hero, $monster); // Appel de la méthode 'fight' de FightsManager pour simuler un combat entre le héros et le monstre.

$heroesManager->update($hero); // Mise à jour des informations du héros en BDD en utilisant la méthode 'update' de HeroesManager

?>

<nav class="navbar bg-body-tertiary">
  <div class="container">
    <a href="index.php" class="mx-auto">
      <img src="./img/dragon_ball_heroes_logo.png" alt="Heroes" width="300" height="auto">
    </a>
  </div>
</nav>
<div class="container-fluid text-center bg-light">
      <div class="col-md-5 p-lg-5 mx-auto">
        <h1 class="display-4 font-weight-normal">Fight Masters</h1>
        <p class="lead font-weight-normal">Help Goku in its quest for peace !</p>
      </div>
</div>

<div class="container">
    <div class="row">
        <!-- HEROS --> 
    <div class="col-lg-3 offset-lg-2 my-5">
            <div class="card">
            <img src="img/son-goku.jpg" class="card-img-top" alt="Goku">
                <div class="card-body text-center">
                    <h4 class="card-title"><?php echo $hero->getHeroName(); ?></h4> <!-- on récupère le nom -->
                    <p class="card-text">&#x2665; <?php echo $hero->getHeroHP(); ?></p> <!-- on récupère les PV -->
                </div>
            </div>
        </div>

        <div class="col-lg-2 d-flex align-items-center justify-content-center">
            <h2>VS</h2>
</div>
        <!-- MONSTRE --> 
    <div class="col-lg-3 my-5">
            <div class="card">
            <img src="img/freezer.jpg" class="card-img-top" alt="Freezer">
                <div class="card-body text-center">
                    <h4 class="card-title"><?php echo $monster->getMonsterName(); ?></h4> <!-- on récupère le nom -->
                    <p class="card-text">&#x2665; <?php echo $monster->getMonsterHP(); ?></p> <!-- on récupère les PV -->
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
    <?php foreach ($fightHistory as $key => $message) {
    echo '<div class="col-lg-6">'  ;  
    echo '<div class="alert ';
    if ($key % 2) {
        echo 'alert-warning';
    } else {
        echo 'alert-info';
    }
    echo '" role="alert">';
    echo $message;
    echo '</div>';
    echo '</div>';
} ?>
</div>
</div>

</body>
</html>