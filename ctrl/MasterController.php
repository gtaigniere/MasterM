<?php


namespace Ctrl;


use Core\Ctrl\Controller;
use Manager\MasterManager;
use Model\Master;

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
        $master = new Master();
        $master->setCombinationToFind($master->randomCombination());
        $master->setCombinationProposal([0, 2, 3, 5]);
        $combination = $master->getCombinationProposal();
        $this->render(ROOT_DIR . 'view/play.php', compact('combination'));
    }

    /**
     * Renvoi vers la page lorsqu'une ressource n'a pas été trouvée
     * @return void
     */
    public function notFound(): void
    {
        $this->render(ROOT_DIR . 'view/not_found.php', []);
    }

}
