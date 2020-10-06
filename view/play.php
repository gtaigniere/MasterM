<?php


use Printer\HtmlCombinationPrinter;

?>

<section id="section_play">

    <h1>Master Mind</h1>

    <?php $printer = new HtmlCombinationPrinter(); ?>

    <?php foreach ($combinations as $combination) : ?>
        <div class="combi-line">
            <?= $printer->print($combination); ?>
        </div>
    <?php endforeach; ?>

</section>
