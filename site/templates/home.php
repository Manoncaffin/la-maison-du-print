<?= snippet('header') ?>
<?= snippet('head') ?>

<main class="container_homepage">

<?php $home = page('site'); ?>
    <h1><?= $page->title()->kti() ?></h1>

    <!-- Logo -->
    <?php if ($site->logo()->first()): ?>
        <div class="all_logo">
            <a href="<?= $site->url() ?>"><img src="<?= $site->logo()->first()->url() ?>" alt="Logotype de La Maison du print" class="logo_homepage"></a>
        </div>
    <?php endif; ?>

    <!-- Présentation -->
        <article class="about">
            <p><?= $page->presentation()->kti() ?></p>
        </article>

    <!-- Image -->
    <?php if ($image = $page->image()): ?>
        <div class="image_homepage">
        <img src="<?= $page->image()->first()->url() ?>" alt="Image d'accueil">
        </div>
    <?php endif ?>

    <!-- Email -->
        <div class="contact">
            <p>Email: <a href="mailto:<?= $page->contact_home() ?>"><?= $page->contact_home() ?></a></p>
        </div>

    <!-- Réseaux sociaux -->
        <div class="networks">
            <ul>
                <?php foreach ($page->networks()->toStructure() as $network): ?>
                    <li>
                        <a href="<?= $network->link() ?>" target="_blank"><?= $network->network() ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
</main>

<?= snippet('footer') ?>