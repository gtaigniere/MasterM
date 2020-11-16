<?php

namespace Core\Ctrl;

/**
 * Class Controller
 * Classe mère du contrôleur de tous nos contrôleurs pour le MasterMind
 * @package Core\Ctrl
 */
class Controller
{
    /**
     * @var string $template
     */
    private $template;

    /**
     * Controller constructor.
     * @param $template
     */
    public function __construct(string $template)
    {
        $this->template = $template;
    }

    /**
     * Envoi les paramètres aux vues
     * @param string $view Chemin de la vue
     * @param array $params Paramètres passés à la vue sous la forme "clef => valeur" où les clefs sont ajoutées à la table des symbôles
     */
    public function render(string $view, array $params): void
    {
        extract($params);
        ob_start();
        require_once $view;
        $section = ob_get_clean();
        require_once $this->template;
    }

}
