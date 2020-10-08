<?php


namespace Ctrl;


use Core\Ctrl\Controller;
use Manager\MasterManager;
use Model\CombiComparator;
use Model\Combination;
use Model\CompareResult;

/**
 * Class MasterController
 * @package Ctrl
 */
class MasterController extends Controller
{
    /**
     * @var MasterManager
     */
    private $masterManager;

    /**
     * MasterController constructor.
     * @param string $template
     */
    public function __construct(string $template = ROOT_DIR . 'view/template.php')
    {
        $this->masterManager = new MasterManager();
        parent::__construct($template);
    }

    /**
     * Affiche la page principale du jeu
     * @return void
     */
    public function play(): void
    {
        $combiToFind = (new Combination([]))->randomCombination();

        $combinations = [new Combination([0, 1, 4, 5]), new Combination([1, 2, 3, 4])];
        $compareResults = [new CompareResult(1, 2)];

        $combination = $combinations[count($combinations) - 1];
        $compareResult = (new CombiComparator())->combiCompare($combiToFind, $combination);

        $compareResults[] = $compareResult;

        $this->render(ROOT_DIR . 'view/play.php', compact('combinations', 'compareResults'));
    }

}
