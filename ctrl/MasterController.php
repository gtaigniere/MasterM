<?php


namespace Ctrl;


use Core\Ctrl\Controller;
use Core\Html\Form;
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
    public function home(Form $form): void
    {
        $this->render(ROOT_DIR . 'view/accueil.php', compact('form'));
    }

    /**
     * Affiche la page de début du jeu
     * @param Form $form
     */
    public function start(Form $form): void
    {
        if (array_key_exists('size', $form->getDatas()) &&
            array_key_exists('level', $form->getDatas())) {
            $size = $form->getValue('size') + 2;
            $level = $form->getValue('level');
            $mastermind = new Mastermind();
            $mastermind->setSize($size);
            $mastermind->setLevel($level);
            $generator = new RandomCombiGenerator();
            $mastermind->setSolution($generator->generate($size, Mastermind::LEVELS[$level], true));
            $this->mastermindManager->save($mastermind);
        }
        $colors = new Combination(Mastermind::LEVELS[$mastermind->getLevel()]);
        $form = new Form();
        $this->render(ROOT_DIR . 'view/play.php', compact('mastermind', 'colors', 'form'));
    }

    /**
     * Affiche la page principale du jeu
     * @param Form $form
     * @return void
     */
    public function play(Form $form): void
    {
        $mastermind = $this->mastermindManager->find();
        $combination = [];
        for ($i = 0; $i < $mastermind->getSize(); $i++) {
            $combination[] = $form->getValue('numColor' . $i);
        }
        $propositions = $mastermind->getPropositions();
        $propositions[] = new Combination($combination);
        $mastermind->setPropositions($propositions);
        $this->mastermindManager->save($mastermind);

        $compareResults = [];
        $comparator = new CombiComparator($mastermind->getSolution());
        foreach ($propositions as $proposition) {
            $compareResults[] = $comparator->compare($proposition);
        }
        $colors = new Combination(Mastermind::LEVELS[$mastermind->getLevel()]);
        $form = new Form();
        $this->render(ROOT_DIR . 'view/play.php', compact('mastermind', 'compareResults', 'colors', 'form'));
    }

}
