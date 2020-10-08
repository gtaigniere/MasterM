<?php


namespace Printer;


use Model\CompareResult;

/**
 * Class ResultPrinter
 * @package Printer
 */
class ResultPrinter
{
    /**
     * ResultPrinter constructor.
     */
    public function __construct()
    {
    }

    /**
     * Renvoie le code Html, pour les pions noirs ou blanc,
     * d'un résultat d'une comparaison entre la combinaison
     * à trouver et une proposée, ainsi que la combinaison proposée
     * @param CompareResult $compareResult
     * @param string $color
     * @return string
     */
    public function printCompareResult(CompareResult $compareResult, string $color): string
    {
        $partLine = '';
        $paws = 0;
        if ($color == 'black') {
            $paws = $compareResult->getBlackPaws();
            $partLine .= '<p class="well-placed">';
        }
        if ($color == 'white') {
            $paws = $compareResult->getWhitePaws();
            $partLine .= '<p class="mis-placed">';
        }
        for ($i = 1; $i <= $paws; $i++) {
            $partLine .= '<span></span>';
        }
        $partLine .= '</p>';
        return $partLine;
    }

}