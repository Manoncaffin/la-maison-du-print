<body class="page-enter">
    <?= snippet('head') ?>
    <?= snippet('header')
    ?>
    console.log("JS chargé !");


    <main class="container_gallery">
        <section class="gallery">

            <nav id='nav-center'>
                <p><a href="<?= $page->url() ?>">TOUT</a></p>
                <p><a href="<?= $page->url(['params' => ['filter' => 'serigraphie']]) ?>">SÉRIGRAPHIE</a></p>
                <p><a href="<?= $page->url(['params' => ['filter' => 'dtf']]) ?>">IMPRESSION DTF</a></p>
            </nav>

            <div class="tags-mobile mobile-dropdown">
                <button class="dropdown-toggle">↓ Type d'impression</button>
                <div class="dropdown-menu">
                    <button class="tag-mobile filter-btn" data-category="all">TOUT</button>
                    <button class="tag-mobile filter-btn" data-category="project-serigraphie">SÉRIGRAPHIE</button>
                    <button class="tag-mobile filter-btn" data-category="project-dtf">IMPRESSION DTF</button>
                </div>
            </div>

            <?php
            $galleryItems = $page->gallery_items()->toStructure();
            $filter = get('filter') ?? '';

            if ($filter) {
                $galleryItems = $galleryItems->filter(function ($item) use ($filter) {
                    return $item->category() == $filter;
                });
            }

            if ($galleryItems->isEmpty()) {
                echo "<p>Aucun élément trouvé.</p>";
            } else {
                $counter = 0;
                $columns = 20;

                foreach ($galleryItems as $item) {
                    $columnClass = 'column-' . ($counter % $columns + 1);
                    $category = $item->category()->value(); // Récupération de la catégorie
                    $categoryClass = 'project-' . $category; // Création de la classe de catégorie

                    $image = $item->image()->toFile();

                    echo '<div class="gallery-item ' . $columnClass . ' ' . $categoryClass . '">';
                    if ($image) {
                        echo '<img src="' . $image->url() . '" alt="">';
                    } else {
                        echo '<p>Image non disponible</p>';
                    }
                    echo '<p>' . $item->about()->text() . '</p>';
                    echo '</div>';

                    $counter++;
                }
            }
            ?>
        </section>

    </main>
    <?= snippet('footer') ?>
</body>
<script src="<?= $site->url() ?>/assets/js/select-option.js"></script>
<script src="<?= $site->url() ?>/assets/js/transition.js"></script>