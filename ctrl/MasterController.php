<?php


namespace Ctrl;


use Core\Ctrl\Controller;
use Manager\MasterManager;
use Model\Combination;
use Model\CompareResult;
use Model\ResultWithCombination;

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
        $combinations = [new Combination([0, 2, 3, 5]), new Combination([1, 2, 3, 4])];
        $compareResults = [new CompareResult(1, 2), new CompareResult(2, 1)];
        $resultWithCombinations = [];
        for ($i = 0; $i < count($combinations); $i++) {
            $resultWithCombinations[] = new ResultWithCombination($combinations[$i], $compareResults[$i]);
        }
        $this->render(ROOT_DIR . 'view/play.php', compact('resultWithCombinations'));
    }

}
