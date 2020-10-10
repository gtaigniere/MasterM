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
     * Renvoie le code Html, pour les pions biens placés,
     * d'un résultat d'une comparaison entre la combinaison
     * à trouver et une proposée, ainsi que la combinaison proposée
     * @param CompareResult $compareResult
     * @return string
     */
    public function printBlack(CompareResult $compareResult): string
    {
        $partLine = '';
        $paws = $compareResult->getBlackPaws();
        $partLine .= '<p class="well-placed">';
        for ($i = 1; $i <= $paws; $i++) {
            $partLine .= '<span></span>';
        }
        return $partLine . '</p>';
    }

    /**
     * Renvoie le code Html, pour les pions mals placés,
     * d'un résultat d'une comparaison entre la combinaison
     * à trouver et une proposée, ainsi que la combinaison proposée
     * @param CompareResult $compareResult
     * @return string
     */
    public function printWhite(CompareResult $compareResult): string
    {
        $partLine = '';
        $paws = $compareResult->getWhitePaws();
        $partLine .= '<p class="mis-placed">';
        for ($i = 1; $i <= $paws; $i++) {
            $partLine .= '<span></span>';
        }
        return $partLine . '</p>';
    }

}