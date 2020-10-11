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
     * @param array $values Couleurs possibles pour chaque pion
     * @param bool $duplicate Autorise la duplication dans la combinaison ou non
     * @return Combination
     */
    public function generate(int $nbPaw, array $values, bool $duplicate = true): Combination
    {
        $combination = [];
        for ($i = 0; $i < $nbPaw; $i++) {
            // Récupère aléatoirement la clef d'une valeur du tableau "$values"
            $key = rand(0, count($values) - 1);
            if (!$duplicate && !in_array($values[$key], $combination) || $duplicate) {
                $combination[] = $values[$key];
            } else {
                $i--;
            }
        }
        return new Combination($combination);
    }

}