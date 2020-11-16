<?php


use Core\Html\Form;
use Model\Combination;
use Printer\CombiPrinter;
use Printer\ResultPrinter;

if (isset($mastermind, $form)) :
?>

    <section id="section_play">

        <h1>Mastermind</h1>

        <p>Ci-dessous les couleurs possibles pour cette partie :</p>

        <?php $combiPrinter = new CombiPrinter(); ?>
        <?php $resultPrinter = new ResultPrinter(); ?>

        <?= $combiPrinter->print($mastermind->getColors()); ?>
        <?= $combiPrinter->print($mastermind->getSolution()); ?>

        <?php if (isset($compareResults)) {
            foreach ($compareResults as $i => $compareResult) : ?>

            <div class="combi-line">

                <?= $resultPrinter->printBlack($compareResult); ?>
                <?= $combiPrinter->print($mastermind->getPropositions()[$i]); ?>
                <?= $resultPrinter->printWhite($compareResult); ?>

            </div>

            <?php endforeach;
        } ?>

        <?php if ($form instanceof Form) : ?>

            <form class="form_play" action="?target=play" method="POST">

                <div>
                    <?php for ($i = 0; $i < $mastermind->getSize(); $i++) : ?>
                        <?= $form->select(('numColor' . $i), Combination::COLORS, null, null, ['required' => 'required']); ?>
                    <?php endfor; ?>
                </div>

                <button class="btn btn-primary">Valider</button>

            </form>

        <?php endif; ?>

    </section>

<?php endif; ?>

