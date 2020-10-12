<?php


use Printer\CombiPrinter;
use Printer\ResultPrinter;

if (isset($solution, $compareResults, $propositions, $colors)) :
?>

<section id="section_play">

    <h1>Master Mind</h1>

    <p>Ci-dessous les couleurs possibles pour cette partie :</p>

    <?php $combiPrinter = new CombiPrinter(); ?>
    <?php $resultPrinter = new ResultPrinter(); ?>

    <?= $combiPrinter->print($colors); ?>
    <?= $combiPrinter->print($solution); ?>

    <?php foreach ($compareResults as $i => $compareResult) : ?>

        <div class="combi-line">

            <?= $resultPrinter->printBlack($compareResult); ?>
            <?= $combiPrinter->print($propositions[$i]); ?>
            <?= $resultPrinter->printWhite($compareResult); ?>

        </div>

    <?php endforeach; ?>

</section>

<?php endif; ?>