<body class="page-enter">
    <?= snippet('head') ?>
    <?= snippet('header') ?>

    <main class="container_gallery">
        <section class="tags-desktop desktop-only">
            <button class="custom-button tag-desktop active" data-category="all">
                <?php echo t('gallery_all'); ?>
            </button>
            <p>|</p>
            <button class="custom-button tag-desktop" data-category="serigraphie">
                <?php echo t('gallery_serigraphy'); ?>
            </button>
            <p>|</p>
            <button class="custom-button tag-desktop" data-category="dtf">
                <?php echo t('gallery_dtf'); ?>
            </button>
        </section>

        <section class="gallery">
            <?php $index = 1; ?>
            <?php foreach ($page->gallery_items()->toStructure() as $item): ?>
                <?php
                $categories = $item->category()->split();
                $image = $item->image()->toFile();
                $categoriesClasses = implode(' ', $categories);
                ?>
                <?php if ($image): ?>
                    <div class="gallery-item <?= $categoriesClasses ?>" data-category="<?= $categoriesClasses ?>">

                        <img src="<?= $image->url() ?>" alt="<?= $item->about()->esc() ?>">
                        <p><?= $item->about()->esc() ?></p>
                    </div>
                    <?php $index++; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </section>

    </main>

    <?= snippet('footer') ?>
    <script src="<?= url('assets/js/filter.js') ?>"></script>
    <script src="<?= url('assets/js/transition.js') ?>"></script>
</body>