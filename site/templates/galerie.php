<body class="page-enter">
    <?= snippet('head') ?>
    <?= snippet('header')
    ?>

    <main class="container_gallery">
        <section class="gallery">

            <div class="tags-desktop desktop-only">
                <button class="tag-desktop active" data-category="all">TOUT</button>
                <button class="tag-desktop" data-category="serigraphie">SÉRIGRAPHIE</button>
                <button class="tag-desktop" data-category="dtf">IMPRESSION DTF</button>
            </div>

            <?php 
$index = 1; // Initialisation du compteur
?>

<?php foreach ($page->gallery_items()->toStructure() as $item): ?>
    <?php
        $categories = $item->category()->split(); // Récupère la catégorie
        $image = $item->image()->toFile(); // Récupère l'image
    ?>

    <?php if ($image): ?>
        <div class="gallery-item column-<?= $index ?>" data-category="<?= implode(' ', $categories) ?>">
            <img src="<?= $image->url() ?>" alt="<?= $item->about()->esc() ?>">
            <p><?= $item->about()->esc() ?></p>
        </div>
        <?php $index++; // Incrémentation du compteur ?>
    <?php endif; ?>
<?php endforeach; ?>

        </section>

    </main>
    <?= snippet('footer') ?>
    <script src="<?= url('assets/js/filter.js') ?>"></script>
    <script src="<?= url('assets/js/transition.js') ?>"></script>
</body>