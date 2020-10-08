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
     * @var Combination[] $combinationsProposals
     */
    private $combinationsProposals;

    /**
     * Master constructor.
     */
    public function __construct()
    {
        $this->combinationToFind = [];
        $this->combinationsProposals = [];
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
    public function getCombinationsProposals()
    {
        return $this->combinationsProposals;
    }

    /**
     * @param array $combinationsProposals
     */
    public function setCombinationsProposals($combinationsProposals)
    {
        $this->combinationsProposals = $combinationsProposals;
    }

}