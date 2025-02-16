<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= url('assets/css/index.css') ?>">
<?php
$current_page = basename($_SERVER['REQUEST_URI'], ".php");
$isGalerieActive = in_array($current_page, ['galerie', 'serigraphie', 'impression-dtf']);
?>


<body>
    <?php if ($image = $page->image()->first()): ?>
        <div class="image_homepage">
            <img src="<?= image()->url() ?>" alt="Image d'accueil">
        </div>
    <?php endif ?>

    <div class="header-wrapper-home">
        <header class="container_header-home">

            <!-- Bouton burger -->
            <input id="toggle" type="checkbox" />
            <label for="toggle" class="burger-home">
                <!-- Icône burger -->
                <div class="button_open"><i class="fas fa-bars"></i></div>
                <!-- Croix de fermeture -->
                <div class="button_close">&times;</div>
            </label>

            <nav class="all_menu-home">
                <ul>
                    <li class="mobile-only-home"><a href="<?= url('home') ?>">ACCUEIL</a></li>
                    <li class="<?= ($page == 'atelier') ? 'active' : '' ?>">
                        <a href="<?= url('atelier') ?>">L'ATELIER</a>
                    </li>
                    <li class="<?= ($page == 'devis') ? 'active' : '' ?>">
                        <a href="<?= url('devis') ?>">DEVIS</a>
                    </li>
                    <li class="<?= ($page == 'galerie') ? 'active' : '' ?>">
                        <a href="<?= url('galerie') ?>">GALERIE</a>
                    </li>
                    <li class="<?= ($page == 'contact') ? 'active' : '' ?>">
                        <a href="<?= url('contact') ?>">CONTACT</a>
                    </li>
                    <?php foreach (kirby()->languages() as $language): ?>
                        <?php if ($language !== kirby()->language()): ?>
                            <li class="language-home">
                                <a href="<?= $page->url($language->code()) ?>">
                                    <?= $language->code() === 'an' ? 'EN' : strtoupper($language->code()) ?>
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </header>
    </div>

    <script src="<?= $site->url() ?>/assets/js/dropdown.js"></script>
</body>