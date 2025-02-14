<?= snippet('head') ?>
<?= snippet('header') ?>

<nav id='nav-center'>
    <p><a href="<?= $page->url() ?>">Tout</a></p>
    <p><a href="<?= $page->url(['params' => ['filter' => 'serigraphie']]) ?>">Sérigraphie</a></p>
    <p><a href="<?= $page->url(['params' => ['filter' => 'dtf']]) ?>">Impression DTF</a></p>
</nav>

<main class="container_gallery page-enter">
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

        // Vérifier si l'image existe avant d'appeler url()
        $image = $item->image()->toFile();
        
        echo '<div class="gallery-item ' . $columnClass . '">';
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
<script src="<?= $site->url() ?>/assets/js/select-option.js"></script>
<script src="<?= $site->url() ?>/assets/js/transition.js"></script>
