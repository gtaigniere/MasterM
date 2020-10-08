<?php


namespace Model;

/**
 * Représente une combinaison proposée avec le résultat d'une comparaison
 * entre la combinaison cité ci-dessus et celle à trouver
 * Class ResultWithCombination
 * @package Model
 */
class ResultWithCombination
{

    /**
     * @var Combination
     */
    private $combination;

    /**
     * @var CompareResult
     */
    private $compareResult;

    /**
     * ResultWithCombination constructor.
     * @param Combination $combination
     * @param CompareResult $compareResult
     */
    public function __construct(Combination $combination, CompareResult $compareResult)
    {
        $this->combination = $combination;
        $this->compareResult = $compareResult;
    }

    /**
     * @return Combination
     */
    public function getCombination(): Combination
    {
        return $this->combination;
    }

    /**
     * @param Combination $combination
     */
    public function setCombination(Combination $combination): void
    {
        $this->combination = $combination;
    }

    /**
     * @return CompareResult
     */
    public function getCompareResult(): CompareResult
    {
        return $this->compareResult;
    }

    /**
     * @param CompareResult $compareResult
     */
    public function setCompareResult(CompareResult $compareResult): void
    {
        $this->compareResult = $compareResult;
    }

}