<?= snippet('head') ?>
<?= snippet('header') ?>

<nav id='nav-center'>
    <p><a href="<?= $page->url() ?>">Tout</a></p>
    <p><a href="<?= $page->url(['params' => ['filter' => 'serigraphie']]) ?>">Sérigraphie</a></p>
    <p><a href="<?= $page->url(['params' => ['filter' => 'dtf']]) ?>">Impression DTF</a></p>
</nav>

<main class="container_gallery">
    <section class="gallery">
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

                echo '<div class="gallery-item ' . $columnClass . '">';
                echo '<img src="' . $item->image()->toFile()->url() . '" alt="">';
                echo '<p>' . $item->about()->text() . '</p>';
                echo '</div>';

                $counter++;
            }
        }
        ?>
    </section>
</main>

<?= snippet('footer') ?>
