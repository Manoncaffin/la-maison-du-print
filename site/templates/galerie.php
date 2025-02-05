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
        // Récupérer tous les éléments de la galerie
        $galleryItems = $page->gallery_items()->toStructure();

        // Récupérer le filtre depuis l'URL
        $filter = get('filter') ?? ''; // Utiliser get() avec une valeur par défaut (vide) pour éviter null

        // Filtrer les éléments si un filtre est appliqué
        if ($filter) {
            $galleryItems = $galleryItems->filter(function ($item) use ($filter) {
                // On vérifie si le champ 'category' correspond au filtre
                return $item->category() == $filter;
            });
        }

        // Afficher les éléments de la galerie
        if ($galleryItems->isEmpty()) {
            echo "<p>Aucun élément trouvé.</p>";
        } else {
            foreach ($galleryItems as $item) {
                echo '<div class="gallery-item">';
                echo '<img src="' . $item->image()->toFile()->url() . '" alt="">';
                echo '<p>' . $item->about()->text() . '</p>';
                echo '</div>';
            }
        }
        ?>
    </section>
</main>

<?= snippet('footer') ?>
