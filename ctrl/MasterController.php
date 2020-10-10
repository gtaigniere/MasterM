<?php


namespace Ctrl;


use Core\Ctrl\Controller;
use Model\CombiComparator;
use Model\Combination;
use Model\RandomCombiGenerator;

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
        $solution = (new RandomCombiGenerator())->generate(4, 6);

        $propositions = [new Combination([0, 1, 4, 5]), new Combination([1, 2, 3, 4])];

        $compareResults = [];
        foreach ($propositions as $proposition) {
            $compareResults[] = (new CombiComparator($solution))->compare($proposition);
        }

        $this->render(ROOT_DIR . 'view/play.php', compact('propositions', 'compareResults', 'solution'));
    }

}
