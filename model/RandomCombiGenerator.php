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
     * @param int $nbPaw Nombre de pions de la combinaison
     * @param int $nbColor Nombre de couleurs possible pour chaque pion
     * @return Combination
     */
    public function generate(int $nbPaw, int $nbColor): Combination
    {
        $combination = [];
        for ($i = 1; $i <= $nbPaw; $i++) {
            $number = rand(0, $nbColor);
            $combination[] = $number;
        }
        return new Combination($combination);
    }

}