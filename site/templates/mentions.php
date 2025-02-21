<body class="page-enter">
<?= snippet('header') ?>
<?= snippet('head') ?>


<?php $contact = page('mentions'); ?>

<main class="page-enter">

    <div class="title-page">
        <h2>MENTIONS LÉGALES</h2>
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
<script src="<?= url('assets/js/transition.js') ?>"></script>
</body>
