<?php


namespace Model;

/**
 * Permet de générer aléatoirement une combinaison
 * @package Model
 */
class RandomCombiGenerator
{
    /**
     * RandomCombiGenerator constructor.
     */
    public function __construct()
    {
    }

    /**
     * Génère une combinaison au hazard
     * @param int $paws Nombre de pions de la combinaison
     * @param int $colors Nombre de couleurs possible pour chaque pion
     * @return Combination
     */
    public function generate(int $paws, int $colors): Combination
    {
        $combination = [];
        for ($i = 1; $i <= $paws; $i++) {
            $number = rand(0, $colors);
            $combination[] = $number;
        }
        return new Combination($combination);
    }

}