<?php


namespace Model;


/**
 * Class Master
 * @package Model
 */
class Master
{
    /**
     * Combinaison à trouver
     * @var Combination $combinationToFind
     */
    private $combinationToFind;

    /**
     * Combinaisons proposées
     * @var Combination[] $combinationProposal
     */
    private $combinationProposal;

    /**
     * Tableau contenant les chiffres possibles pour chaque partie de la combinaison
     */
    const COLORS = ["rouge", "vert", "bleu", "noir", "blanc", "jaune"];

    /**
     * Master constructor.
     */
    public function __construct()
    {
        $this->combinationToFind = [];
        $this->combinationProposal = [];
    }

    /**
     * @return array
     */
    public function getCombinationToFind()
    {
        return $this->combinationToFind;
    }

    /**
     * @param array $combinationToFind
     */
    public function setCombinationToFind($combinationToFind)
    {
        $this->combinationToFind = $combinationToFind;
    }

    /**
     * @return array
     */
    public function getCombinationProposal()
    {
        return $this->combinationProposal;
    }

    /**
     * @param array $combinationProposal
     */
    public function setCombinationProposal($combinationProposal)
    {
        $this->combinationProposal = $combinationProposal;
    }

    /**
     * Sélectionne une combinaison au hazard
     * @return array
     */
    public function randomCombination(): array
    {
        $combination = [];
        for ($i = 0; $i <= 3; $i++) {
            $number = rand(0, 5);
            $combination[] = $this::COLORS[$number];
        }
        return $combination;
    }

}