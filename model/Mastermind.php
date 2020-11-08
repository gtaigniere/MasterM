<?php


namespace Model;


/**
 * Class Mastermind
 * @package Model
 */
class Mastermind
{

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
        $this->solution = new Combination([]);
        $this->propositions = [];
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

}
