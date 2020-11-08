<?php


namespace Printer;


use Model\Combination;

/**
 * Class CombiPrinter
 * @package Printer
 */
class CombiPrinter
{
    /**
     * CombiPrinter constructor.
     */
    public function __construct()
    {
    }

    /**
     * Renvoie le code Html d'une combinaison
     * @param Combination $combination
     * @return string
     */
    public function print(Combination $combination): string
    {
        $partLine = '<p class="combi-tried">';
        var_dump($combination->getPaws());
        foreach ($combination->getPaws() as $value) {
            $partLine .= '<span class="' . Combination::COLORS[$value] . '"></span>';
        }
        return $partLine . '</p>';
    }

}

