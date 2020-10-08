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

            <?= $resultPrinter->printBlack($compareResults[$i]); ?>
            <?= $combiPrinter->printCombination($combinations[$i]); ?>
            <?= $resultPrinter->printWhite($compareResults[$i]); ?>

        </div>

    <?php endfor; ?>

</section>
