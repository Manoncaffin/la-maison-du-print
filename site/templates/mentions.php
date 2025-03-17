<body class="page-enter <?= $page->slug() ?>">
<?= snippet('header') ?>
<?= snippet('head') ?>


<?php $contact = page('mentions'); ?>

<main class="page-enter">

    <div class="title-page">
    <h2><?php echo t('legal_notices'); ?></h2>
        <div class="border"></div>
    </div>

    <section class="container_mentions">
        <div class="legal-notice">
            <div class="column column-1">
                <p><?= $page->column1()->kti() ?></p>
            </div>
            <div class="column column-2">
                <p><?= $page->column2()->kti() ?></p>
            </div>
        </div>
    </sectionn>

</main>

<?= snippet('footer') ?>
<script src="<?= url('assets/js/transition.js') ?>"></script>
</body>






