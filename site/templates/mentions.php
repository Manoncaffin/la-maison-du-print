<?= snippet('header') ?>
<?= snippet('head') ?>


<?php $contact = page('mentions'); ?>

<main>

    <div class="title-page">
        <h1>MENTIONS LÉGALES</h1>
        <div class="border"></div>
    </div>

    <section class="container_mentions">
        <div class="legal-notice">
            <div class="column column-1">
                <?= $page->column1()->kti() ?>
            </div>
            <div class="column column-2">
                <?= $page->column2()->kti() ?>
            </div>
        </div>
    </sectionn>


</main>

<?= snippet('footer') ?>