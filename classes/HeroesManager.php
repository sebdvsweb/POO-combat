<?php

class HeroesManager {

    private $db;


    // CONSTRUCTEUR DE CLASS AVEC INSTANCIATION PDO
    public function __construct(PDO $db)
    {
        $this->setDb($db); // Appelle la méthode setDb pour définir la connexion à la base de données
    }

    // Méthode pour définir la connexion à la base de données
    public function setDb($db)
    {
        $this->db = $db; // Stocke l'objet PDO dans la propriété privée $db
    }



    // FONCTION D'AJOUT D'UN HEROS A LA BDD 

    public function add(Hero $hero) {

        $req = $this->db->prepare('INSERT INTO heroes(name) VALUES (:name)'); // Préparation de la requête SQL
        $req->execute([
            'name' => $hero->getHeroName()
        ]); // Exécution
        
        // $req->bindValue(':name', $hero->getHeroName(), PDO::PARAM_STR);
        // $req->execute();
    
        $id = $this->db->lastInsertId(); // Récupère l'ID généré par la dernière insertion
        $hero->setHeroId($id);// Utilise la méthode setHeroId pour définir l'ID du héros
    }



    // FONCTION DE RECUPERATION DES HEROS ALIVE EN BDD 

    public function findAllAlive() {
        
        $req = $this->db->prepare('SELECT * FROM heroes WHERE health_point > 0');
        $req->execute();

        $heroesArray = $req->fetchAll(PDO::FETCH_ASSOC);

        $heroes = [];

        foreach($heroesArray as $heroData) {
            $heroes[] = new Hero($heroData);
       }

       return $heroes;
    }



    // FONCTION FIND : ELLE VA RECUPERER LE HEROS CHOISI PAR L'UTILISATEUR GRACE À SON ID 

    public function find(int $heroId){

        $req = $this->db->prepare('SELECT *from heroes WHERE id = :heroId');
        $req->execute(
            ['heroId' => $heroId]
        );

        // $req->bindValue(':heroId', $heroId, PDO::PARAM_INT);
        // $req->execute();

       $data = $req->fetch(PDO::FETCH_ASSOC); // Récupération des données en tableau

       // Si aucune donnée n'est trouvée, on retourne null
       if (!$data) {
           return null;
       }

       // Création d'une nouvelle instance de Hero avec les données récupérées du tableau
       $hero = new Hero(['name', 'healthPoint']);
       $hero->setHeroId($data['id']);
       $hero->setHeroName($data['name']);
       $hero->setHeroHP($data['health_point']);

       return $hero; // le combattant à venir !
    
    }



    // FONCTION UPDATE : MISE A JOUR DES DONNÉES DU HEROS DANS LA BDD APRES UN COMBAT

    public function update($hero) {
        $req = $this->db->prepare('UPDATE heroes SET health_point = :health_point WHERE id = :heroId');
        $req->execute(
            ['heroId' => $hero->getHeroId(),
            'health_point' => $hero->getHeroHP()]
        );

        /*
        $req->bindValue(':heroId', $hero->getHeroId(), PDO::PARAM_INT);
        $req->bindValue(':health_point', $hero->getHeroHP(), PDO::PARAM_INT);
        $req->execute();
        */
    }

}