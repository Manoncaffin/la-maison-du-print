<body class="page-enter">
    <?= snippet('head') ?>
    <?= snippet('header')
    ?>



    <main class="container_gallery">
        <section class="gallery">

        <div class="tags-desktop desktop-only">
    <button class="tag-desktop active" data-category="all">tout</button>
    <button class="tag-desktop" data-category="serigraphie">sérigraphie</button>
    <button class="tag-desktop" data-category="dtf">impression DTF</button>
</div>

        <?php foreach ($page->gallery_items()->toStructure() as $item): ?>
        <?php
            $categories = $item->category()->split(); // Récupère la catégorie
            $image = $item->image()->toFile(); // Récupère l'image
        ?>
        <?php if ($image): ?>
            <div class="gallery-item" data-category="<?= implode(' ', $categories) ?>">
                <img src="<?= $image->url() ?>" alt="<?= $item->about()->esc() ?>">
                <p><?= $item->about()->esc() ?></p>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
        </section>

    </main>
    <?= snippet('footer') ?>
    <script src="<?= url('assets/js/filter.js') ?>"></script>
    <script src="<?= url('assets/js/transition.js') ?>"></script>
</body>
