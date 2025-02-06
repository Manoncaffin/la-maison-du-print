<?= snippet('header_home') ?>
<?= snippet('head') ?>

<main class="container_homepage">

    <?php $home = page('site'); ?>

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

    <!-- Présentation -->
    <article class="about">
        <h1><?= $page->atelier()->kti() ?></h1>
        <p><?= $page->presentation()->kti() ?></p>
    </article>

    <!-- Email -->
    <div class="foot">
        <div class="contact">
            <p>Contact</p>
            <p><a href="mailto:<?= $page->contact_home() ?>"><?= $page->contact_home() ?></a></p>
        </div>

        <!-- Réseaux sociaux -->
        <?php if ($page->networks()->isNotEmpty()): ?>
            <div class="social-networks">
                <?php foreach ($page->networks()->toStructure() as $network): ?>
                    <div class="network-item">
                        <?php
                        $networkName = $network->network()->value();
                        $networkLink = $network->link()->value();
                        $iconClass = '';

                        if (strtolower($networkName) == 'instagram') {
                            $iconClass = 'fa-brands fa-instagram'; 
                        } elseif (strtolower($networkName) == 'facebook') {
                            $iconClass = 'fa-brands fa-facebook';  
                        }
                        ?>

                        <a href="<?= $networkLink ?>" class="network-link">
                            <span class="network-icon <?= $iconClass ?>"></span>
                            <span class="network-text"><?= $networkName ?></span>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

</main>