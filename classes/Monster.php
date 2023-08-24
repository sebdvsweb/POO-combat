<?php

class Monster {

    private $name;
    private $healthPoint;


    // GETTERS

    public function getMonsterName()
    {
        return $this->name;
    }

    public function getMonsterHP()
    {
        return $this->healthPoint;
    }

    // SETTERS

    public function setMonsterName($name)
    {
        $this->name = $name;
    }

    public function setMonsterHP($healthPoint)
    {
        $this->healthPoint = $healthPoint;
    }

    // FONCTION HIT

    public function hit(Hero $hero) {

        $damage = rand(0,20);
        $hero->setHeroHP($hero->getHeroHP() - $damage);

        return $damage;
    }

}
