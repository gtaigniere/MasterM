<?php


namespace Printer;


use Model\Master;
use Model\ResultWithCombination;

class HtmlCombinationPrinter
{

    /**
     * HtmlCombinationPrinter constructor.
     */
    public function __construct()
    {
    }

    /**
     * Renvoie le code Html d'une ligne d'un résultat d'une comparaison entre la combinaison
     * à trouver et une proposée, ainsi que la combinaison proposée
     * @param ResultWithCombination $resultWithCombination
     * @return string
     */
    public function printResultWithCombination(ResultWithCombination $resultWithCombination): string
    {
        $blackPaws = $resultWithCombination->getCompareResult()->getBlackPaws();
        $whitePaws = $resultWithCombination->getCompareResult()->getWhitePaws();
        $line = '<p class="well-placed">';
        for ($i = 1; $i <= $blackPaws; $i++) {
            $line .= '<span></span>';
        }
        $line .= '</p>';
        $line .= '<p class="combi-tried">';
        foreach ($resultWithCombination->getCombination()->getPaws() as $value) {
            $line .= '<span class="' . Master::COLORS[$value] . '"></span>';
        }
        $line .= '</p>';
        $line .= '<p class="mis-placed">';
        for ($i = 1; $i <= $whitePaws; $i++) {
            $line .= '<span></span>';
        }
        $line .= '</p>';
        return $line;
    }

}
