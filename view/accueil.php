<?php

use Core\Html\Form;
use Core\Util\ErrorManager;

if (isset($form)) :
?>

    <section id="section_accueil">

        <h1><strong>Mastermind</strong></h1>

        <?php
        foreach (ErrorManager::getMessages() as $message) : ?>
            <p class="alert alert-danger" role="alert">
                <?= $message ?>
            </p>
        <?php endforeach;
        ErrorManager::destroy();
        ?>

        <p>Bonjour et bienvenue.</p>

        <p>Choisissez la taille de la combinaison ainsi que la difficulté.<br>
            La taille correspond au nombre de pions dont elle est composée<br>
            (de 2 à 8), et la difficulté correspond au nombre de couleurs<br>
            possibles (Easy = 4 / Medium = 6 / Hard = 8).</p>

        <?php if ($form instanceof Form) : ?>

            <form class="form_accueil" action="?target=start" method="POST">

                <div>
                    <?= $form->select('size', [2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8],'Longueur :', null, ['required' => 'required']); ?>
                </div>

                <div>
                    <?= $form->select('level', ["Easy", "Medium", "Hard"], 'Difficulté :', null, ['required' => 'required']); ?>
                </div>

                <button class="btn btn-primary">Valider</button>

            </form>

        <?php endif; ?>

    </section>

<?php endif; ?>

