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

$heroesManager = new HeroesManager($db);// création d'une nouvelle instance de HeroesManager associée à notre BDD

if(isset($_POST['name']) && !empty($_POST['name'])) { // si un nom de héros est entré...

    $hero = new Hero(['name', 'healthPoint']); // ... Instanciation d'un Héros avec les arguments attendus en tableau -> cf constructeur
    $hero->setHeroName($_POST['name']); // Définit le nom du héros
    $heroesManager->add($hero); // Ajout dans la BDD via la foncion add()

}

$heroes = $heroesManager->findAllAlive(); // Récupérer tous les héros vivants pour pouvoir boucler dessus

?>
<nav class="navbar bg-body-tertiary">
  <div class="container">
  <a href="index.php"  class="mx-auto">
      <img src="./img/dragon_ball_heroes_logo.png" alt="Heroes" width="300" height="auto">
</a>
  </div>
</nav>
<div class="container-fluid text-center bg-light">
      <div class="col-md-5 p-lg-5 mx-auto">
        <h1 class="display-4 font-weight-normal">Fight Masters</h1>
        <p class="lead font-weight-normal">Help Goku in its quest for peace !</p>
        <form method="post">
                        <h5 class="card-title">Create your hero</h5>
                        <div class="mb-3 px-4">
                            <input type="text" class="form-control my-3 px-4" id="name" placeholder="NAME" name="name">
                        </div>
                        <button class="btn btn-outline-warning btn-lg px-4 gap-3">Create</button>
        </form>
      </div>
</div>

<div class="container">
    <div class="row">
        <!-- Boucle PHP pour récupérer tous les héros de la BDD -->
    <?php foreach ($heroes as $hero){ ?> <!-- Lecture du tableau des héros encore vivants -->
        <div class="col-lg-3 my-5">
            <div class="card">
            <img src="img/son-goku.jpg" class="card-img-top" alt="Goku">
                <div class="card-body text-center">
                    <h4 class="card-title"><?php echo $hero->getHeroName(); ?></h4> <!-- on récupère le nom -->
                    <p class="card-text">&#x2665; <?php echo $hero->getHeroHP(); ?></p> <!-- on récupère les PV -->
                    <a href="./fight.php?hero_id=<?=$hero->getHeroId()?>" class="btn btn-warning">Selectionner</a> <!-- on link vers fight.php + ID du héros -->
                </div>
            </div>
        </div>
        <?php } // fin de la boucle ?>
</div>
</div>

</body>
</html>