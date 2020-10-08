<?php


use Printer\CombiPrinter;
use Printer\ResultPrinter;

?>

<section id="section_play">

    <h1>Master Mind</h1>

    <?php $combiPrinter = new CombiPrinter(); ?>
    <?php $resultPrinter = new ResultPrinter(); ?>

    <?php for ($i = 0; $i < count($compareResults); $i++) : ?>

        <div class="combi-line">

            <?= $resultPrinter->printCompareResult($compareResults[$i], 'black'); ?>
            <?= $combiPrinter->printCombination($combinations[$i]); ?>
            <?= $resultPrinter->printCompareResult($compareResults[$i], 'white'); ?>

        </div>

    <?php endfor; ?>

</section>
