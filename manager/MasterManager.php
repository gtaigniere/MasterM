<?php


namespace Manager;


use Model\Master;

/**
 * Class MasterManager
 * @package Manager
 */
class MasterManager
{
    /**
     * MasterManager constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return Master
     */
    public function find(): Master
    {
        $master = new Master();
        $master->setCombinationToFind(array_key_exists('combinationToFind', $_SESSION) ? $_SESSION['combinationToFind'] : []);
        $master->setCombinationProposal(array_key_exists('combinationProposal', $_SESSION) ? $_SESSION['combinationProposal'] : []);
        return $master;
    }

    /**
     * @param Master $master
     * @return void
     */
    public function save(Master $master): void
    {
        $_SESSION['combinationToFind'] = $master->getCombinationToFind();
        $_SESSION['combinationProposal'] = $master->getCombinationProposal();
    }

}