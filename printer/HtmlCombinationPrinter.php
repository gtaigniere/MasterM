<?php


namespace Printer;


use Model\Combination;
use Model\Master;

class HtmlCombinationPrinter
{

    /**
     * HtmlCombinationPrinter constructor.
     */
    public function __construct()
    {
    }

    /**
     * Renvoi le code Html d'une combinaison
     * @param Combination $combination
     * @return string
     */
    public function print(Combination $combination): string
    {
        $line = '<p class="combi-tried">';
        foreach ($combination->getPaws() as $value) {
            $line .= '<span class="' . Master::COLORS[$value] . '"></span>';
        }
        return $line . '</p>';
    }

}
