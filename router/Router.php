<?php


namespace Router;


use Core\Html\Form;
use Ctrl\MastermindController;


class Router
{
    /**
     * @var array
     */
    private $params;

    /**
     * @var MastermindController
     */
    private $mastermindController;

    /**
     * Router constructor.
     * @param array $params
     */
    public function __construct(array $params)
    {
        $this->params = $params;
        $this->mastermindController = new MastermindController();
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
        $this->mastermindController->home();
    }

    public function start(): void
    {
        $form = new Form($_POST);
        $this->mastermindController->start($form);
    }

    public function play(): void
    {
        $form = new Form($_POST);
        $this->mastermindController->play($form);
    }

}
