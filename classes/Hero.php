<?php


class Hero {

    // Propriétés privées de la classe Hero
    private $id;
    private $name;
    private $healthPoint = 100; // Valeur par défaut de 100 pour healthPoint

    // CONSTRUCTEUR DE CLASS

    public function __construct(array $data) { // Prend un tableau en argument pour stocker les données 

        // Vérifie si 'id' existe dans le tableau de données
        if (isset($data['id'])) {
            $this->setHeroId($data['id']); // Appelle la méthode pour définir id
        }

        // Vérifie si 'name' existe dans le tableau de données
        if (isset($data['name'])) {
            $this->setHeroName($data['name']); // Appelle la méthode pour définir name
        }

        // Vérifie si 'health_point' existe dans le tableau de données
        if (isset($data['health_point'])) {
            $this->setHeroHP($data['health_point']); // Appelle la méthode pour définir healthPoint
        }
    }

    // GETTERS

    // Méthode pour obtenir la valeur de id
    public function getHeroId()
    {
        return $this->id;
    }

    // Méthode pour obtenir la valeur de name
    public function getHeroName()
    {
        return $this->name;
    }

    // Méthode pour obtenir la valeur de healthPoint
    public function getHeroHP()
    {
        return $this->healthPoint;
    }

    // SETTERS

    // Méthode pour définir la valeur de id
    public function setHeroId($id)
    {
        $this->id = $id;
    }

    // Méthode pour définir la valeur de name
    public function setHeroName($name)
    {
        $this->name = $name;
    }

    // Méthode pour définir la valeur de healthPoint
    public function setHeroHP($healthPoint)
    {
        $this->healthPoint = $healthPoint;
    }

    // FONCTION HIT

    public function hit(Monster $monster) {

        $damage = rand(0,20); // Dégats aléatoires
        $monsterHealthPoint = $monster->getMonsterHP(); // Récupération des HP du monstre
        $monster->setMonsterHP($monsterHealthPoint - $damage); // Retrait des dégats

        return $damage;

    }
}