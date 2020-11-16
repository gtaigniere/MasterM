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
     * Génère une combinaison aléatoire de taille "$nbPaw" composée des valeurs "$values"
     * @param int $nbPaw Nombre de pions de la combinaison
     * @param int[] $values Couleurs possibles pour chaque pion
     * @param bool $duplicate Si "true", autorise plusieurs valeurs identiques dans la combinaison,
     * sinon toutes les valeurs de la combinaison seront uniques
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
