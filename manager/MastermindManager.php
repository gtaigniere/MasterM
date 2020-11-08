<?php


namespace Manager;


use Model\Combination;
use Model\Mastermind;

/**
 * Class MastermindManager
 * @package Manager
 */
class MastermindManager
{

    /**
     * MastermindManager constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return Mastermind
     */
    public function find(): Mastermind
    {
        $mastermind = new Mastermind();
        $mastermind->setSize(array_key_exists('size', $_SESSION) ? $_SESSION['size'] : 0);
        $mastermind->setLevel(array_key_exists('level', $_SESSION) ? $_SESSION['level'] : 0);
        $mastermind->setSolution(array_key_exists('solution', $_SESSION) ? new Combination($_SESSION['solution']) : new Combination([]));
        $propositions = [];
        if (array_key_exists('propositions', $_SESSION)) {
            foreach ($_SESSION['propositions'] as $proposition) {
                $propositions[] = new Combination($proposition);
            }
        }
        $mastermind->setPropositions($propositions);
        $mastermind->setRemainingAttempts(array_key_exists('remainingAttempts', $_SESSION) ? $_SESSION['remainingAttempts'] : 10);
        return $mastermind;
    }

    /**
     * @param Mastermind $mastermind
     * @return void
     */
    public function save(Mastermind $mastermind): void
    {
        $_SESSION['size'] = $mastermind->getSize();
        $_SESSION['level'] = $mastermind->getLevel();
        $_SESSION['solution'] = $mastermind->getSolution()->getPaws();
        $propositionsPaws = [];
        foreach ($mastermind->getPropositions() as $proposition) {
            $propositionsPaws[] = $proposition->getPaws();
        }
        $_SESSION['propositions'] = $propositionsPaws;
        $_SESSION['remainingAttempts'] = $mastermind->getRemainingAttempts();
    }

}
