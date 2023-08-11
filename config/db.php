<?php

// CONNEXION BDD

$db = new PDO('mysql:host=127.0.0.1;port=8889;dbname=combat', 'root', 'root');


// On émet une alerte à chaque fois qu'une requête a échoué.
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 

return $db;