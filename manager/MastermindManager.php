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
     * @return Mastermind|null
     */
    public function find(): ?Mastermind
    {
        if (isset($_SESSION['mastermind'])) {
            $mastermind = new Mastermind();
            $mastermind->setSize(array_key_exists('size', $_SESSION['mastermind']) ? $_SESSION['mastermind']['size'] : 0);
            $mastermind->setLevel(array_key_exists('level', $_SESSION['mastermind']) ? $_SESSION['mastermind']['level'] : 0);
            $mastermind->setColors(array_key_exists('colors', $_SESSION['mastermind']) ? new Combination($_SESSION['mastermind']['colors']) : new Combination([]));
            $mastermind->setSolution(array_key_exists('solution', $_SESSION['mastermind']) ? new Combination($_SESSION['mastermind']['solution']) : new Combination([]));
            $propositions = [];
            if (array_key_exists('propositions', $_SESSION['mastermind'])) {
                foreach ($_SESSION['mastermind']['propositions'] as $proposition) {
                    $propositions[] = new Combination($proposition);
                }
            }
            $mastermind->setPropositions($propositions);
            $mastermind->setRemainingAttempts(array_key_exists('remainingAttempts', $_SESSION['mastermind']) ? $_SESSION['mastermind']['remainingAttempts'] : 10);
            return $mastermind;
        }
        return null;
    }

    /**
     * @param Mastermind $mastermind
     * @return void
     */
    public function save(Mastermind $mastermind): void
    {
        $_SESSION['mastermind']['size'] = $mastermind->getSize();
        $_SESSION['mastermind']['level'] = $mastermind->getLevel();
        $_SESSION['mastermind']['colors'] = $mastermind->getColors()->getPaws();
        $_SESSION['mastermind']['solution'] = $mastermind->getSolution()->getPaws();
        $propositionsPaws = [];
        foreach ($mastermind->getPropositions() as $proposition) {
            $propositionsPaws[] = $proposition->getPaws();
        }
        $_SESSION['mastermind']['propositions'] = $propositionsPaws;
        $_SESSION['mastermind']['remainingAttempts'] = $mastermind->getRemainingAttempts();
    }

}
