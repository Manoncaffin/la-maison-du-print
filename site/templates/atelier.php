<?= snippet('header') ?>
<?= snippet('head') ?>

<main class="page-enter">
    <section class="container_atelier">
        <?php $atelier = page('atelier'); ?>

        <div class="title-page">
            <h1>L’HISTOIRE DE L’ATELIER</h1>
            <div class="border"></div>
        </div>

        <div class="about">
            <?php foreach (explode("\n", $atelier->about()->text()) as $paragraph): ?>
                <p><?= trim($paragraph); ?></p>
            <?php endforeach; ?>
        </div>

        <div class="video">
            <?php if ($atelier->video()->isNotEmpty()): ?>
                <video controls>
                    <source src="<?= $atelier->video()->toFile()->url(); ?>" type="video/mp4">
                    Votre navigateur ne supporte pas la balise vidéo.
                </video>
            <?php endif; ?>
        </div>
        <div class="title-page">
            <h1>DEUX TECHNIQUES D’IMPRESSIONS</h1>
            <div class="border"></div>
        </div>
        <!-- <div class="info-question">
        <p>Si vous avez des doutes sur le procédé d'impression à choisir, je me tiens disponible pour vous accompagner et vous conseiller.</p>
    </div> -->
    </section>

    <article class="technique">
        <!-- Sérigraphie -->
        <section class="technique-section_one">
            <?php foreach ($atelier->serigraphie()->toBlocks() as $block): ?>
                <div class="gallery_title">
                    <h3><?= $block->titre() ?></h3>
                </div>
                <div class="gallery_text">
                    <p><?= $block->texte()->kt() ?></p>
                    <div class="gallery_button">
                        <a href="<?= $site->url() ?>/galerie">
                            <button>Voir la galerie</button>
                        </a>
                    </div>
                </div>
                <div class="gallery_img">
                    <img src="<?= $block->image()->toFile()->url() ?>" alt="Impression sérigraphie, Alice et Sarah">
                </div>
            <?php endforeach; ?>
            <div class="border_two"></div>
        </section>

        <!-- Impression DTF -->
        <section class="technique-section_two">
            <?php foreach ($atelier->impression_dtf()->toBlocks() as $block): ?>
                <div class="gallery_title_two">
                    <h3><?= $block->titre() ?></h3>
                </div>
                <div class="gallery_img_two">
                    <img src="<?= $block->image()->toFile()->url() ?>" alt="Impression DTF, Biribi">
                </div>
                <div class="gallery_text_two">
                    <p><?= $block->texte()->kt() ?></p>
                    <div class="gallery_button_two">
                        <a href="<?= $site->url() ?>/galerie">
                            <button>Voir la galerie</button>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>

        </section>
    </article>

</main>

<?= snippet('footer') ?>
<script src="<?= $site->url() ?>/assets/js/transition.js"></script>