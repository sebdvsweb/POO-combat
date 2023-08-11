<?php

class FightsManager {

    // FONCTION DE CREATION DU MONSTRE

    public function createMonster($name) {
        
        $monster = new Monster(); // nouvelle instance
        $monster->setMonsterName($name); // configuration du nom
        $monster->setMonsterHP(100); // configuration des HP

        return $monster; // renvoyer l'instance à son appel
    }



    // FONCTION FIGHT 

    public function fight(Hero $hero, Monster $monster) {

        $fightHistory = [];
       

        while ($hero->getHeroHP() > 0 && $monster->getMonsterHP() > 0) {
            $damage = $monster->hit($hero);
            $fightHistory[] = $monster->getMonsterName().' frappe '.$hero->getHeroName().' et lui enlève '.$damage.' points de vie.<br> '.$hero->getHeroName().' n\'a plus que '.$hero->getHeroHP().' points de vie' ;

            if($hero->getHeroHP() <= 0) {
                $fightHistory[] = '<b>Shame... '.$hero->getHeroName().' est mort. '.$monster->getMonsterName().' a gagné le combat</b>';
                $hero->setHeroHP(0);
                break;
            }


            $damage = $hero->hit($monster);
            $fightHistory[] = $hero->getHeroName().' frappe '.$monster->getMonsterName().' et lui enlève '.$damage.' points de vie.<br> '.$monster->getMonsterName().' n\'a plus que '.$monster->getMonsterHP().' points de vie' ;


            if($monster->getMonsterHP() <= 0) {
                $fightHistory[] = '<b>Yes ! '.$monster->getMonsterName().' est mort. '.$hero->getHeroName().' a gagné le combat !</b>';
                $monster->setMonsterHP(0);
                break;
            }
        }

        return $fightHistory;
    }
}