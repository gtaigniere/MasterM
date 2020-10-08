<?php


namespace Model;

/**
 * Class CombiComparator
 * @package Model
 */
class CombiComparator
{
    /**
     * CombiComparator constructor.
     */
    public function __construct()
    {
    }

    /**
     *
     * @param Combination $combiToFind
     * @param Combination $combination
     * @return CompareResult
     */
    public function combiCompare(Combination $combiToFind, Combination $combination): CompareResult
    {
        $pionsBiensPlacesRetires = [];
        $pionsMalsPlacesRetires = [];
        $counterBlackPaws = 0;
        $counterWhitePaws = 0;
        $tabCombiToFind = $combiToFind->getPaws();
        $tabCombination = $combination->getPaws();
        echo 'Pions de la combinaison à trouver  : ';
        foreach ($tabCombiToFind as $value) {
            echo $value . ' ';
        }
        echo '<br><br>';
        echo 'Pions de la combinaison proposée : ';
        foreach ($tabCombination as $value) {
            echo $value . ' ';
        }
        echo '<br><br>';
        // On regarde combien il y a de pions biens placés
        for ($i = 0; $i < count($tabCombiToFind); $i++) {
            if ($tabCombiToFind[$i] == $tabCombination[$i]) {
                $counterBlackPaws++;
                $pionsBiensPlacesRetires[] = array_splice($tabCombiToFind, $i, 1);
                array_splice($tabCombination, $i, 1);
                $i--;
            }
        }
        // On regarde combien il y a de pions mals placés
        for ($i = 0; $i < count($tabCombiToFind); $i++) {
            for ($j = 0; $j < count($tabCombination); $j++) {
                if ($tabCombiToFind[$i] == $tabCombination[$j]) {
                    $counterWhitePaws++;
                    $pionsMalsPlacesRetires[] = array_splice($tabCombiToFind, $i, 1);
                    array_splice($tabCombination, $j, 1);
                    if ($i > 0) {
                        $i--;
                    }
                    $j--;
                }
            }
        }
        echo 'Nombre de pions biens placés => ' . $counterBlackPaws;
        echo '<br><br>';
        echo 'Nombre de pions mals placés  => ' . $counterWhitePaws;
        echo '<br><br>';
        echo 'Pion(s) de la bonne couleur et bien(s) placé(s) :  ';
        foreach ($pionsBiensPlacesRetires as $tabs) {
            foreach ($tabs as $value) {
                echo $value . ' ';
            }
        }
        echo '<br><br>';
        echo 'Pion(s) de la bonne couleur et mal(s) placé(s) : ';
        foreach ($pionsMalsPlacesRetires as $tabs) {
            foreach ($tabs as $value) {
                echo $value . ' ';
            }
        }
        return new CompareResult($counterBlackPaws, $counterWhitePaws);
    }

}