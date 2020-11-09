<?php


namespace Model;


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
     * Ajoute une combinaison proposée au tableau des propositions
     * Renvoie le tableau des combinaisons proposées (propositions)
     * @param Combination $proposition Combinaison proposée
     * @return Combination[]
     */
    public function addProposition(Combination $proposition): array
    {
        $this->propositions[] = $proposition;
        return $this->propositions;
    }

}
