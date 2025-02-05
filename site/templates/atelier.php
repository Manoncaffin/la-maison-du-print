<?= snippet('header') ?>
<?= snippet('head') ?>
<main>
    <section class="container_atelier">
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
            <?php
            $blocks = $atelier->Technique()->toBlocks();
            foreach ($blocks as $index => $block): ?>
                <div class="technique-section">
                    <?php
                    $index = (int)$index;
                    ?>

                    <!-- Alternance entre texte et image -->
                    <?php if ($index % 2 == 0): ?>
                        <!-- Impair : texte à gauche, image à droite -->
                        <div class="text">
                            <h3><?php echo $block->titre(); ?></h3>
                            <p><?php echo $block->texte(); ?></p>
                            <?php if ($block->image()->isNotEmpty()): ?>
                                <a href="/galerie">
                                    <button>Voir la galerie</button>
                                </a>
                            <?php endif; ?>
                        </div>
                        <?php if ($block->image()->isNotEmpty()): ?>
                            <img src="<?php echo $block->image()->toFile()->url(); ?>" alt="<?php echo $block->titre(); ?>">
                        <?php endif; ?>
                    <?php else: ?>
                        <!-- Pair : image à gauche, texte à droite -->
                        <?php if ($block->image()->isNotEmpty()): ?>
                            <img src="<?php echo $block->image()->toFile()->url(); ?>" alt="<?php echo $block->titre(); ?>">
                        <?php endif; ?>
                        <div class="text">
                            <h3><?php echo $block->titre(); ?></h3>
                            <p><?php echo $block->texte(); ?></p>
                            <?php if ($block->image()->isNotEmpty()): ?>
                                <a href="/galerie">
                                    <button>Voir la galerie</button>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>

        </div>

        <div class="info-question">
            <p>Si vous avez des doutes sur le procédé d'impression à choisir, je me tiens disponible pour vous accompagner et vous conseiller.</p>
        </div>

    </section>

</main>

<?= snippet('footer') ?>