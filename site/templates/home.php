<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

<?= snippet('head') ?>
<?= snippet('header') ?>

<main class="container_homepage">

<?php $home = page('site'); ?>
    <article class="about">
        <p><?= $site->presentation()->kti() ?></p>
    </article>

    </main>

<?= snippet('footer') ?>