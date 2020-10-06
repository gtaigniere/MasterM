<?php

use Core\Html\Form;

?>

<section id="section_accueil">

    <h1><strong>Bienvenue</strong></h1>

    <p></p>

    <?php if ($form instanceof Form) : ?>

        <form class="form_accueil" action="?target=start" method="POST">

            <div>
                <?= $form->input('player', 'Prénom :', ['required' => 'required']); ?>
            </div>

            <button class="btn btn-primary">Valider</button>

        </form>

    <?php endif; ?>

</section>