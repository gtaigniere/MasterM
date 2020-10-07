<?php


use Printer\HtmlCombinationPrinter;

?>

<section id="section_play">

    <h1>Master Mind</h1>

    <?php $printerLine = new HtmlCombinationPrinter(); ?>

    <?php foreach ($resultWithCombinations as $resultWithCombination) : ?>

        <div class="combi-line">

            <?= $printerLine->printResultWithCombination($resultWithCombination); ?>

        </div>

    <?php endforeach; ?>

</section>
