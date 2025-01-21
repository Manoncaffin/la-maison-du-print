<?= snippet('header') ?>
<?= snippet('head') ?>

<main class="container_atelier">
    <?php $atelier = page('atelier'); ?>

    <div class="title-page">
        <h1>L’HISTOIRE DE L’ATELIER</h1>
        <div class="border"></div>
    </div>

    <div class="about">
        <p><?php echo $atelier->about()->text(); ?></p>
    </div>

    <div class="video">
        <?php if ($atelier->video()->isNotEmpty()): ?>
            <video controls>
                <source src="<?php echo $atelier->video()->toFile()->url(); ?>" type="video/mp4">
                Votre navigateur ne supporte pas la balise vidéo.
            </video>
        <?php endif; ?>
    </div>

    <div class="title-page">
        <h1>DEUX TECHNIQUES D’IMPRESSIONS</h1>
        <div class="border"></div>
    </div>
    <div class="technique">
        <?php foreach ($atelier->Technique()->toBlocks() as $block): ?>
            <div class="technique-section">
                <h3><?php echo $block->titre(); ?></h3>
                <p><?php echo $block->texte(); ?></p>
                <?php if ($block->image()->isNotEmpty()): ?>
                    <img src="<?php echo $block->image()->toFile()->url(); ?>" alt="<?php echo $block->titre(); ?>">
                    <a href="/galerie">
                        <button>Voir la galerie</button>
                    </a>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="info-question">
    <p>Si vous avez des doutes sur le procédé d'impression à choisir, je me tiens disponible pour vous accompagner et vous conseiller.</p>
    </div>

</main>

<?= snippet('footer') ?>