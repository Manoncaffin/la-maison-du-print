<?php snippet('header') ?>
<?php snippet('head') ?>

<body class="page-enter <?= $page->slug() ?>">

    <main class="container_devis page-enter">
        <?php $devis = page('devis'); ?>

        <div class="title-page">
            <h2><?= t('devis.title') ?></h2>
            <div class="border"></div>
        </div>

        <?php if ($image = $page->image()): ?>
            <img src="<?= $image->url() ?>" alt="À propos - Image" class="about-image">
        <?php else: ?>
            <p>Aucune image définie pour cette page.</p>
        <?php endif; ?>

        <?php if ($devis->about()->isNotEmpty()): ?>
            <div class="about-section">
                <p><?= $devis->about()->kti() ?></p>
            </div>
        <?php endif; ?>

    </main>

    <?= snippet('footer') ?>
    <script src="<?= url('assets/js/transition.js') ?>"></script>

</body>