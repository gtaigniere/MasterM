<?php


namespace Ctrl;


use Core\Ctrl\Controller;
use Model\CombiComparator;
use Model\Combination;
use Model\CompareResult;
use Model\Mastermind;
use Model\RandomCombiGenerator;
use Printer\CombiPrinter;

/**
 * Class MasterController
 * @package Ctrl
 */
class MasterController extends Controller
{
    /**
     * MasterController constructor.
     * @param string $template
     */
    public function __construct(string $template = ROOT_DIR . 'view/template.php')
    {
        parent::__construct($template);
    }

    /**
     * Affiche la page principale du jeu
     * @return void
     */
    public function play(): void
    {
        $nbPaw = 4;
        $generator = new RandomCombiGenerator();

        $solution = $generator->generate($nbPaw, Mastermind::MEDIUM, false);

        $propositions = [new Combination([0, 1, 3, 6]), new Combination([1, 2, 3, 4])];

        $compareResults = [];
        $comparator = new CombiComparator($solution);
        foreach ($propositions as $proposition) {
            $compareResults[] = $comparator->compare($proposition);
        }
        $colors = new Combination(Mastermind::MEDIUM);

        $this->render(ROOT_DIR . 'view/play.php', compact('propositions', 'compareResults', 'solution', 'colors'));
    }

}
