<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= url('assets/css/index.css') ?>">

<body>
    <header class="container_header">

        <a href="<?= url('home') ?>" class="all_logo">
            <img src="<?= $site->logo()->first()->url() ?>" alt="Logo" class="logo_header">
        </a>

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
            <li><a href="<?= url('home') ?>">ACCUEIL</a></li>
            <li><a href="<?= url('atelier') ?>">ATELIER</a></li>
            <li><a href="<?= url('devis') ?>">DEVIS</a></li>
            <li><a href="<?= url('galerie') ?>">GALERIE</a></li>
            <li><a href="<?= url('contact') ?>">CONTACT</a></li>
            <li class="language"><a href="<?= url('EN') ?>">EN</a></li>
        </ul>
    </nav>
    </header>