<?php


namespace Model;

/**
 * Représente une combinaison proposée
 * @package Model
 */
class Combination
{
    /**
     * Combinaison
     * @var int[] $paws
     */
    private $paws;

    /**
     *
     * Tableau contenant les couleurs possibles pour chaque pion de la combinaison
     */
    const COLORS = ["rouge", "orange", "jaune", "vert", "bleu", "violet", "noir", "blanc"];

    /**
     * Combination constructor.
     * @param int[] $paws
     */
    public function __construct(array $paws)
    {
        $this->paws = $paws;
    }

    /**
     * @return int[]
     */
    public function getPaws(): array
    {
        return $this->paws;
    }

    /**
     * @param int[] $paws
     */
    public function setPaws(array $paws): void
    {
        $this->paws = $paws;
    }

}
