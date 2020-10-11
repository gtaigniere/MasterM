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

    <?php for ($i = 0; $i < count($compareResults); $i++) : ?>

        <div class="combi-line">

            <?= $resultPrinter->printBlack($compareResults[$i]); ?>
            <?= $combiPrinter->print($propositions[$i]); ?>
            <?= $resultPrinter->printWhite($compareResults[$i]); ?>

        </div>

    <?php endfor; ?>

</section>

<?php endif; ?>