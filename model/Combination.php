<?php


namespace Model;

/**
 * Représente une combinaison proposée
 * Class Combination
 * @package Model
 */
class Combination
{
    /**
     * Combinaison
     * @var array $paws
     */
    private $paws;

    /**
     *
     * Tableau contenant les chiffres possibles pour chaque partie de la combinaison
     */
    const COLORS = ["rouge", "vert", "bleu", "noir", "blanc", "jaune"];

    /**
     * Combination constructor.
     * @param $paws
     */
    public function __construct(array $paws)
    {
        $this->paws = $paws;
    }

    /**
     * @return array
     */
    public function getPaws(): array
    {
        return $this->paws;
    }

    /**
     * @param array $paws
     */
    public function setPaws(array $paws): void
    {
        $this->paws = $paws;
    }

    /**
     * Sélectionne une combinaison au hazard
     * @return Combination
     */
    public function randomCombination(): Combination
    {
        $combination = [];
        for ($i = 0; $i <= 3; $i++) {
            $number = rand(0, 5);
            $combination[] = $number;
        }
        return new Combination($combination);
    }

}