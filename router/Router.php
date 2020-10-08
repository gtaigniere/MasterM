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
     * Router constructor.
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

}