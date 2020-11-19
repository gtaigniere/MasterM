<?php


namespace Ctrl;


use Core\Ctrl\Controller;
use Core\Html\Form;
use Core\Util\ErrorManager;
use Exception;
use Manager\MastermindManager;
use Model\CombiComparator;
use Model\Combination;
use Model\Mastermind;
use Model\RandomCombiGenerator;

/**
 * Class MastermindController
 * @package Ctrl
 */
class MastermindController extends Controller
{

    /**
     * @var MastermindManager
     */
    private $mastermindManager;

    /**
     * MastermindController constructor.
     * @param string $template
     */
    public function __construct(string $template = ROOT_DIR . 'view/template.php')
    {
        $this->mastermindManager = new MastermindManager();
        parent::__construct($template);
    }

    /**
     * Affiche la page d'accueil du jeu
     * @param Form $form
     */
    public function home(): void
    {
        $form = new Form();
        $this->render(ROOT_DIR . 'view/accueil.php', compact('form'));
    }

    /**
     * Affiche la page de démarrage du jeu
     * @param Form $config
     */
    public function start(Form $config): void
    {
        $size = $config->getValue('size');
        $level = $config->getValue('level');
        $duplicate = (bool) $config->getValue('duplicate');
        if ($duplicate || $size <= count(Mastermind::LEVELS[$level])) {
            if ($size !== null && $level !== null) {
                $mastermind = new Mastermind();
                $mastermind->setSize($size);
                $mastermind->setLevel($level);
                $generator = new RandomCombiGenerator();
                $mastermind->setColors(new Combination(Mastermind::LEVELS[$level]));
                $mastermind->setSolution($generator->generate($size, Mastermind::LEVELS[$level], $duplicate));
                $this->mastermindManager->save($mastermind);
            }
            $form = new Form();
            $this->render(ROOT_DIR . 'view/play.php', compact('mastermind', 'form'));
        } else {
            ErrorManager::add('Sans doublons, la taille de la solution doit être inférieure ou égale au nombre de couleurs possibles !');
            header ('Location: index.php');
        }
    }

    /**
     * Affiche la page principale du jeu
     * @param Form $form
     * @return void
     * @throws Exception
     */
    public function play(Form $form): void
    {
        $mastermind = $this->mastermindManager->find();
        if ($mastermind && !$mastermind->isGameOver()) {
            $combination = [];
            for ($i = 0; $i < $mastermind->getSize(); $i++) {
                $combination[] = $form->getValue('numColor' . $i);
            }
            $mastermind->play(new Combination($combination));
            $this->mastermindManager->save($mastermind);
            if ($mastermind->isGameWon()) {
                $this->render(ROOT_DIR . 'view/win.php', compact('mastermind'));
            } elseif ($mastermind->isGameLost()) {
                $this->render(ROOT_DIR . 'view/loose.php', compact('mastermind'));
            } else {
                $form = new Form();
                $this->render(ROOT_DIR . 'view/play.php', compact('mastermind', 'form'));
            }
        } elseif ($mastermind && $mastermind->isGameWon()) {
            $this->render(ROOT_DIR . 'view/win.php', compact('mastermind'));
        } elseif ($mastermind && $mastermind->isGameLost()) {
            $this->render(ROOT_DIR . 'view/loose.php', compact('mastermind'));
        } else {
            ErrorManager::add('La partie n\'a pas encore été créé !');
            header ('Location: index.php');
        }
    }

}
