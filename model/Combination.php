<?php


namespace Model;

/**
 * Représente une combinaison proposée
 * Class Combination
 * @package Model
 */
class Combination
{
    /**
     * Combinaison
     * @var array $paws
     */
    private $paws;

    /**
     * Combination constructor.
     * @param $paws
     */
    public function __construct(array $paws)
    {
        $this->paws = $paws;
    }

    /**
     * @return array
     */
    public function getPaws(): array
    {
        return $this->paws;
    }

    /**
     * @param array $paws
     */
    public function setPaws(array $paws): void
    {
        $this->paws = $paws;
    }

}