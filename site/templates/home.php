<body class="page-enter">
<?= snippet('header_home') ?>
<?= snippet('head') ?>

<main class="container_homepage">

    <?php $home = page('site'); ?>
    
    <!-- Présentation -->
    <article class="about">
        <h1><?= $page->atelier()->kti() ?></h1>
        <p><?= $page->presentation()->kti() ?></p>
    </article>

    <!-- Logo -->
    <?php
    $logo = $site->files()->find('logo.png');
    if ($logo): ?>
        <div class="all_logo_homepage">
            <a href="<?= $site->url() ?>"><img src="<?= $logo->url() ?>" alt="Logotype de La Maison du Print" class="logo_homepage"></a>
        </div>
    <?php else: ?>
        <p>Logo non trouvé</p>
    <?php endif; ?>

    <!-- Photo -->
    <?php if ($image = $page->image()->first()): ?>
        <div class="image_homepage-home">
            <img src="<?= image()->url() ?>" alt="Image d'accueil">
        </div>
    <?php endif ?>

    </div>

</main>
<script src="<?= url('assets/js/transition.js') ?>"></script>
</body>
