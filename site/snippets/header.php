<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= url('assets/css/index.css') ?>">

<body>
    <header class="container_header">
        <div class="all_logo">
            <a href="<?= url('home') ?>"><img src="<?= $site->logo()->first()->url() ?>" alt="Logo" class="logo_header"></a>
            <h1 class="title_header">LA MAISON DU PRINT</h1>
        </div>

        <input id="toggle" type="checkbox" />
        <label class="burger" for="toggle">
            <div class="button_open"><i class="fas fa-bars"></i></div>
            <div class="button_close"><img src="<?= $site->url() ?>/assets/images/close.svg"></div>
        </label>

        <nav class="all_menu">
            <ul class="menu">
            <?php if($page->title() == 'Atelier'): ?>
                <li class="hover active">
                    <!-- <img src="<?= $site->url() ?>/assets/images/arrow.svg" class="arrow_header" id="arrow_active"> -->
                    <a href="<?= url('atelier') ?>" class="title_active">atelier</a>
                </li>
            <?php else: ?>
                <li class="hover">
                    <!-- <img src="<?= $site->url() ?>/assets/images/arrow.svg" class="arrow_header"> -->
                    <a href="<?= url('atelier') ?>">ATELIER</a>
                </li>
            <?php endif ?>
            <?php if(url() == url('Devis')): ?>
                <li class="hover active">
                    <!-- <img src="<?= $site->url() ?>/assets/images/arrow.svg" class="arrow_header"> -->
                    <a href="<?= url('devis') ?>">DEVIS</a>
                </li>
            <?php else: ?>
                <li class="hover">
                    <!-- <img src="<?= $site->url() ?>/assets/images/arrow.svg" class="arrow_header"> -->
                    <a href="<?= url('devis') ?>">DEVIS</a>
                </li>
            <?php endif ?>
            <?php if(url() == url('Galerie')): ?>
                <li class="hover active">
                    <!-- <img src="<?= $site->url() ?>/assets/images/arrow.svg" class="arrow_header"> -->
                    <a href="<?= url('galerie') ?>">GALERIE</a>
                </li>
            <?php else: ?>
                <li class="hover">
                    <!-- <img src="<?= $site->url() ?>/assets/images/arrow.svg" class="arrow_header"> -->
                    <a href="<?= url('galerie') ?>">GALERIE</a>
                </li>
            <?php endif ?>
            <?php if(url() == url('Contact')): ?>
                <li class="hover active">
                    <!-- <img src="<?= $site->url() ?>/assets/images/arrow.svg" class="arrow_header"> -->
                    <a href="<?= url('contact') ?>">CONTACT</a>
                </li>
            <?php else: ?>
                <li class="hover">
                    <!-- <img src="<?= $site->url() ?>/assets/images/arrow.svg" class="arrow_header"> -->
                    <a href="<?= url('contact') ?>">CONTACT</a>
                </li>
            <?php endif ?>
            <?php if(url() == url('Langue')): ?>
                <li class="hover_other active">
                    <!-- <img src="<?= $site->url() ?>/assets/images/arrow.svg" class="arrow_header"> -->
                    <a href="<?= url('Langue') ?>">EN</a>
                </li>
            <?php else: ?>
                <li class="hover_other">
                    <!-- <img src="<?= $site->url() ?>/assets/images/arrow.svg" class="arrow_header"> -->
                    <a href="<?= url('Langue') ?>">EN</a>
                </li>
            <?php endif ?>
            </ul>
        </nav>
    </header>

</body>

</html>