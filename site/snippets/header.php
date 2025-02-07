<?php
$current_page = basename($_SERVER['REQUEST_URI'], ".php");
$isGalerieActive = in_array($current_page, ['galerie', 'serigraphie', 'impression-dtf']);
$logo = $site->files()->find('logo.png');
?>

<body>
    <div class="header-wrapper">
        <header class="container_header">

            <?php if ($logo): ?>
                <div class="logo">
                    <a href="<?= url('home') ?>" class="all_logo">
                        <img src="<?= $logo->url() ?>" alt="Logo" class="logo_header">
                    </a>
                    <h1>LA MAISON DU PRINT</h1>
                </div>
            <?php else: ?>
                <p>Logo non trouvé</p>
            <?php endif; ?>

            <!-- Bouton burger -->
            <input id="toggle" type="checkbox" />
            <label for="toggle" class="burger">
                <!-- Icône burger -->
                <div class="button_open"><i class="fas fa-bars"></i></div>
                <!-- Croix de fermeture -->
                <div class="button_close">&times;</div>
            </label>

            <nav class="all_menu">
                <ul>
                    <li class="mobile-only"><a href="<?= url('home') ?>">ACCUEIL</a></li>
                    <li class="<?= ($page == 'atelier') ? 'active' : '' ?>">
                        <a href="<?= url('atelier') ?>">L'ATELIER</a>
                    </li>
                    <li class="<?= ($page == 'devis') ? 'active' : '' ?>">
                        <a href="<?= url('devis') ?>">DEVIS</a>
                    </li>
                    <li class="<?= ($page == 'galerie') ? 'active' : '' ?>">
                        <a href="<?= url('galerie') ?>">GALERIE</a>
                    </li>
                    <!-- <li class="dropdown <?= $isGalerieActive ? 'active' : '' ?>">
                    <span>GALERIE</span>
                    <ul class="dropdown-menu">
                        <li><a href="serigraphie.php">SÉRIGRAPHIE</a></li>
                        <li><a href="impression-dtf.php">IMPRESSION DTF</a></li>
                    </ul>
                </li> -->
                    <li class="<?= ($page == 'contact') ? 'active' : '' ?>">
                        <a href="<?= url('contact') ?>">CONTACT</a>
                    </li>
                    <li class="language"><a href="<?= $site->language()->url() == '/' ? url('en') : url() ?>">
            <?= $site->language()->code() == 'fr' ? 'EN' : 'FR' ?>
        </a></li>
                </ul>
            </nav>
        </header>
    </div>

    <script src="<?= $site->url() ?>/assets/js/dropdown.js"></script>