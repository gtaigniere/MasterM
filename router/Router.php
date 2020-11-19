<?php


namespace Router;


use Core\Html\Form;
use Core\Util\ErrorManager;
use Ctrl\MastermindController;
use Exception;


class Router
{
    /**
     * @var array
     */
    private $params;

    /**
     * Router constructor.
     * @param array $params
     */
    public function __construct(array $params)
    {
        $this->params = $params;
    }

    public function route(): void
    {
        if (isset($this->params['target'])) {
            switch ($this->params['target']) {
                case 'start':
                    $this->start();
                    break;
                case 'play':
                    $this->play();
                    break;
                default:
                    $this->home();
            }
        } else {
            $this->home();
        }
    }

    public function home(): void
    {
        $ctrl = new MastermindController();
        $ctrl->home();
    }

    public function start(): void
    {
        $ctrl = new MastermindController();
        $form = new Form($_POST);
        $ctrl->start($form);
    }

    public function play(): void
    {
        $ctrl = new MastermindController();
        $form = new Form($_POST);
        try {
            $ctrl->play($form);
        } catch (Exception $e) {
            ErrorManager::add($e->getMessage());
            header ('Location: index.php');
        }
    }

}
