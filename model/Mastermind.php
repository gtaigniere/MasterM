<?php


namespace Model;


use Exception;

/**
 * Class Mastermind
 * @package Model
 */
class Mastermind
{

    // Modifier les sessions pour avoir une session mastermind
    /**
     * Taille des combinaisons
     * @var int $size
     */
    private $size;

    /**
     * Niveau de difficulté
     * @var int $level
     */
    private $level;

    /**
     * Couleurs utilisables
     * @var Combination $colors
     */
    private $colors;

    /**
     * Combinaison à trouver
     * @var Combination $solution
     */
    private $solution;

    /**
     * Combinaisons proposées
     * @var Combination[] $propositions
     */
    private $propositions;

    /**
     * Résultats de comparaisons
     * @var CompareResult[] $compareResults
     */
    private $compareResults;

    /**
     * Nombre de tentatives restantes
     * @var int $remainingAttempts
     */
    private $remainingAttempts;

    /**
     * Tableaux correspondants aux niveaux de difficulté
     */
    const LEVELS = [
        [2, 3, 5, 6],
        [0, 1, 3, 4, 6, 7],
        [0, 1, 2, 3, 4, 5, 6, 7]
    ];

    /**
     * Mastermind constructor.
     */
    public function __construct()
    {
        $this->size = 0;
        $this->level = 0;
        $this->propositions = [];
        $this->compareResults = [];
        $this->remainingAttempts = 10;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @param int $size
     */
    public function setSize(int $size): void
    {
        $this->size = $size;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @param int $level
     */
    public function setLevel(int $level): void
    {
        $this->level = $level;
    }

    /**
     * @return Combination
     */
    public function getColors(): Combination
    {
        return $this->colors;
    }

    /**
     * @param Combination $colors
     */
    public function setColors(Combination $colors): void
    {
        $this->colors = $colors;
    }

    /**
     * @return Combination
     */
    public function getSolution(): Combination
    {
        return $this->solution;
    }

    /**
     * @param Combination $solution
     */
    public function setSolution(Combination $solution): void
    {
        $this->solution = $solution;
    }

    /**
     * @return Combination[]
     */
    public function getPropositions(): array
    {
        return $this->propositions;
    }

    /**
     * @param Combination[] $propositions
     */
    public function setPropositions(array $propositions): void
    {
        $this->propositions = $propositions;
    }

    /**
     * @return CompareResult[]
     */
    public function getCompareResults(): array
    {
        return $this->compareResults;
    }

    /**
     * @param CompareResult[] $compareResults
     */
    public function setCompareResults(array $compareResults): void
    {
        $this->compareResults = $compareResults;
    }

    /**
     * @return int
     */
    public function getRemainingAttempts(): int
    {
        return $this->remainingAttempts;
    }

    /**
     * @param int $remainingAttempts
     */
    public function setRemainingAttempts(int $remainingAttempts): void
    {
        $this->remainingAttempts = $remainingAttempts;
    }

    /**
     * @param Combination $proposition
     * @throws Exception Si la partie n'existe pas ou qu'elle est terminée
     */
    public function play(Combination $proposition): void
    {
        if ($this->remainingAttempts <= 0) {
            throw new Exception('Partie non créée');
        } else {
            $this->propositions[] = $proposition;
            $comparator = new CombiComparator($this->getSolution());
            $this->compareResults[] = $comparator->compare($proposition);
            $this->remainingAttempts--;
        }
    }

    /**
     * Renvoie true si la partie n'est ni gagné ni perdu
     * @return bool
     */
    public function isGameOver(): bool
    {
        return ($this->isGameLost() || $this->isGameWon());
    }

    /**
     * Renvoie true si la partie est perdue
     * @return bool
     */
    public function isGameLost(): bool
    {
        return $this->remainingAttempts <= 0;
    }

    /**
     * Renvoie true si la partie est gagnée
     * @return bool
     */
    public function isGameWon(): bool
    {
        if (isset($this->propositions[count($this->propositions) - 1])) {
            $proposition = $this->propositions[count($this->propositions) - 1];
            return $proposition->getPaws() == $this->solution->getPaws();
        }
        return false;
    }

}
