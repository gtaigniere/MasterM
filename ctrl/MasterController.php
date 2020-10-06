<?php


namespace Ctrl;


use Core\Ctrl\Controller;
use Manager\MasterManager;
use Model\Combination;

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

        $this->render(ROOT_DIR . 'view/play.php', compact('combinations'));
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
