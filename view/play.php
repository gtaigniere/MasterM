<?php

use Core\Util\ErrorManager;
use Core\Util\SuccessManager;
use Model\Master;

?>

<section id="section_play">

    <h1>Master Mind</h1>

    <?php
    foreach (SuccessManager::getMessages() as $message) : ?>
        <div class="alert alert-success" role="alert">
            <?= $message ?>
        </div>
    <?php endforeach;
    SuccessManager::destroy();

    foreach (ErrorManager::getMessages() as $message) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $message ?>
        </div>
    <?php endforeach;
    ErrorManager::destroy();
    ?>

    <div class="combi-line">

        <p class="combi-tried">
            <?php foreach ($combination as $colorIndex) : ?>
                <span class="<?= Master::COLORS[$colorIndex]; ?>"></span>
            <?php endforeach; ?>
        </p>

    </div>

</section>
