<?php


namespace Model;

/**
 * Permet de comparer une combinaison fournie à la solution
 * @package Model
 */
class CombiComparator
{
    /**
     * Combinaison à trouver
     * @var Combination $solution
     */
    private $solution;

    /**
     * CombiComparator constructor.
     * @param Combination $solution
     */
    public function __construct(Combination $solution)
    {
        $this->solution = $solution;
    }

    /**
     * Compare la combinaison à trouver avec une proposée
     * @param Combination $propositionPaws
     * @return CompareResult
     */
    public function compare(Combination $propositionPaws): CompareResult
    {
        $black = 0;
        $white = 0;
        $solutionPaws = $this->solution->getPaws();
        $propositionPaws = $propositionPaws->getPaws();
        // On regarde combien il y a de pions biens placés
        for ($i = 0; $i < count($solutionPaws); $i++) {
            if ($solutionPaws[$i] == $propositionPaws[$i]) {
                $black++;
                array_splice($solutionPaws, $i, 1);
                array_splice($propositionPaws, $i, 1);
                $i--;
            }
        }
        // On regarde combien il y a de pions mals placés
        for ($i = 0; $i < count($solutionPaws); $i++) {
            for ($j = 0; $j < count($propositionPaws); $j++) {
                if ($solutionPaws[$i] == $propositionPaws[$j]) {
                    $white++;
                    array_splice($solutionPaws, $i, 1);
                    array_splice($propositionPaws, $j, 1);
                    if ($i > 0) {
                        $i--;
                    }
                    $j--;
                }
            }
        }
        return new CompareResult($black, $white);
    }

}