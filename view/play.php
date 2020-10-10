<?php


use Printer\CombiPrinter;
use Printer\ResultPrinter;

if (isset($solution, $compareResults, $propositions)) :
?>

<section id="section_play">

    <h1>Master Mind</h1>

    <?php $combiPrinter = new CombiPrinter(); ?>
    <?php $resultPrinter = new ResultPrinter(); ?>

    <?= $combiPrinter->printCombination($solution); ?>

    <?php for ($i = 0; $i < count($compareResults); $i++) : ?>

        <div class="combi-line">

            <?= $resultPrinter->printBlack($compareResults[$i]); ?>
            <?= $combiPrinter->printCombination($propositions[$i]); ?>
            <?= $resultPrinter->printWhite($compareResults[$i]); ?>

        </div>

    <?php endfor; ?>

</section>

<?php endif; ?>