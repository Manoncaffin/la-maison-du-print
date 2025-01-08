<?= snippet('header') ?>
<?= snippet('head') ?>


<?php $contact = page('mentions'); ?>
<main class="container_mentions">

    <div class="title-page">
        <h1>MENTIONS LÉGALES</h1>
        <div class="border"></div>
    </div>

    <div class="legal-notice">
    <div class="column column-1">
        <?= $page->column1()->kti() ?>
    </div>
    <div class="column column-2">
        <?= $page->column2()->kti() ?>
    </div>
</div>


</main>

<?= snippet('footer') ?>