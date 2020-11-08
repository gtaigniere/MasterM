<?php

use Core\Html\Form;

if (isset($form)) :
    ?>

    <section id="section_accueil">

        <h1><strong>MasterMind</strong></h1>

        <p>Bonjour et bienvenue</p>

        <p>Choisissez la taille de la combinaison et sa difficulté.<br>
            La taille correspond au nombre de pions dont elle est composée<br>
            alors que la difficulté correspond au nombre de couleurs possibles.</p>

        <?php if ($form instanceof Form) : ?>

            <form class="form_accueil" action="?target=start" method="POST">

                <div>
                    <?= $form->select('size', [2, 3, 4, 5, 6, 7, 8],'Longueur :', null, ['required' => 'required']); ?>
                </div>

                <div>
                    <?= $form->select('level', ["Easy", "Medium", "Hard"], 'Difficulté :', null, ['required' => 'required']); ?>
                </div>

                <button class="btn btn-primary">Valider</button>

            </form>

        <?php endif; ?>

    </section>

<?php endif; ?>

