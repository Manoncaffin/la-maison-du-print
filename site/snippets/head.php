<!doctype html>
<html lang="<?= kirby()->language()->code() ?>">

<head>
    <meta charset="utf-8">

    <!-- Primary Meta Tags -->
    <title><?= $site->title() ?></title>
    <meta name="title" content="<?= $site->title() ?>" />
    <meta name="description" content="" />
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?= $site->url() ?>" />
    <meta property="og:title" content="<?= $site->title() ?>" />
    <meta property="og:description" content="" />
    <meta property="og:image" content="<?= $site->url() ?>/assets/imgs/meta-tags.png" />
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="<?= $site->url() ?>" />
    <meta property="twitter:title" content="<?= $site->title() ?>" />
    <meta property="twitter:description" content="" />
    <meta property="twitter:image" content="<?= $site->url() ?>/assets/imgs/meta-tags.png" />

    <meta name="<?= $site->title() ?>" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="Keywords" content="Ateliers artistiques mutualisés, Lyon, ..." />
    <meta name="Author" content="Friche artistique Lamartine" />
    <meta name="Revisit-After" content="15 days" />
    <meta name="Robots" content="All" />
    <?= css(['assets/css/index.css', '@auto']) ?>

    <link rel="apple-touch-icon" sizes="180x180" href="<?= $site->url() ?>/assets/imgs/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $site->url() ?>/assets/imgs/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $site->url() ?>/assets/imgs/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?= $site->url() ?>/assets/imgs/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?= $site->url() ?>/assets/imgs/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="MyWebSite" />
    <link rel="manifest" href="/site.webmanifest" />


</head>