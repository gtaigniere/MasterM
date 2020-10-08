<?php


namespace Model;

/**
 * Représente le résultat d'une comparaison
 * entre une combinaison proposée et celle à trouver
 * Class CompareResult
 * @package Model
 */
class CompareResult
{
    /**
     * Nombre de pions noirs du résultat
     * @var int $blackPaws
     */
    private $blackPaws;

    /**
     * Nombre de pions blancs du résultat
     * @var int $whitePaws
     */
    private $whitePaws;

    /**
     * Combination constructor.
     * @param int $blackPaws
     * @param int $whitePaws
     */
    public function __construct(int $blackPaws, int $whitePaws)
    {
        $this->blackPaws = $blackPaws;
        $this->whitePaws = $whitePaws;
    }

    /**
     * @return int
     */
    public function getBlackPaws(): int
    {
        return $this->blackPaws;
    }

    /**
     * @param int $blackPaws
     */
    public function setBlackPaws(int $blackPaws): void
    {
        $this->blackPaws = $blackPaws;
    }

    /**
     * @return int
     */
    public function getWhitePaws(): int
    {
        return $this->whitePaws;
    }

    /**
     * @param int $whitePaws
     */
    public function setWhitePaws(int $whitePaws): void
    {
        $this->whitePaws = $whitePaws;
    }

}