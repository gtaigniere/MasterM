<?php


namespace Router;


use Ctrl\MasterController;


class Router
{
    /**
     * @var array
     */
    private $params;

    /**
     * RouterNew constructor.
     * @param array $params
     */
    public function __construct(array $params)
    {
        $this->params = $params;
    }

    public function route(): void
    {
        $ctrl = new MasterController();
        $ctrl->play();
    }

    private function notFound(): void
    {
        (new MasterController())->notFound();
    }

}