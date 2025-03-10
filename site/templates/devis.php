<body class="page-enter">
    <?php snippet('header') ?>
    <?= snippet('head') ?>

    <?php var_dump($errors, $success); ?>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        var_dump($_POST, $_FILES);
    } ?>


    <body>

        <main class="container_devis page-enter">
            <?php $devis = page('devis'); ?>

            <div class="title-page">
                <h2><?= t('devis.title') ?></h2>
                <div class="border"></div>
            </div>

            <?php if ($image = $page->image()): ?>
                <img src="<?= $image->url() ?>" alt="À propos - Image" class="about-image">
            <?php else: ?>
                <p>Aucune image définie pour cette page.</p>
            <?php endif; ?>

            <?php if ($devis->about()->isNotEmpty()): ?>
                <div class="about-section">
                    <p><?= $devis->about()->kti() ?></p>
                    <p class="icon-time"><i class="fa fa-hourglass-start"></i> <?= t('devis.time') ?></p>
                    <div class="devis_button">
                        <a href="#devisForm"><?php echo t('devis_button'); ?></a>
                    </div>
                </div>
            <?php endif; ?>

            <form id="devisForm" action="<?= $page->url() ?>" method="post" enctype="multipart/form-data">
                <!-- Section: Votre commande -->
                <div class="first">
                    <div class="form-section-one">
                        <h2><?= t('devis.order') ?></h2>
                        <label for="model"><?= t('devis.model') ?></label>
                        <input id="model" name="model" type="text" placeholder="<?= t('placeholder.model') ?>" required>

                        <label for="background"><?= t('devis.background') ?></label>
                        <input id="background" name="background" type="text" placeholder="<?= t('placeholder.background') ?>" required>

                        <label for="articles"><?= t('devis.articles') ?></label>
                        <input id="articles" name="articles" type="number" placeholder="<?= t('placeholder.articles') ?>" required>

                        <label for="color"><?= t('devis.color') ?></label>
                        <input id="color" name="color" type="text" placeholder="<?= t('placeholder.color') ?>" required>

                        <label for="to_print"><?= t('devis.to_print') ?></label>
                        <input id="to_print" name="to_print" type="text" placeholder="<?= t('placeholder.to_print') ?>" required>

                        <label for="description"><?= t('devis.description') ?></label>
                        <textarea id="description" name="description" placeholder="<?= t('placeholder.description') ?>"></textarea>

                        <label for="files"><?= t('devis.files') ?></label>
                        <input id="files" name="files[]" type="file" multiple required accept=".pdf,.ai">
                    </div>
                    <!-- Section: Informations client -->
                    <div class="form-section-two">
                        <h2><?= t('devis.info') ?></h2>
                        <label for="name"><?= t('devis.company') ?></label>
                        <input id="name" name="name" type="text" placeholder="<?= t('placeholder.company') ?>" required>

                        <label for="name"><?= t('devis.siret') ?></label>
                        <input id="name" name="name" type="text" placeholder="<?= t('placeholder.siret') ?>" required>

                        <label for="name"><?= t('devis.name') ?></label>
                        <input id="name" name="name" type="text" placeholder="<?= t('placeholder.name') ?>" required>

                        <label for="firstname"><?= t('devis.firstname') ?></label>
                        <input id="firstname" name="firstname" type="text" placeholder="<?= t('placeholder.firstname') ?>" required>

                        <label for="email"><?= t('devis.email') ?></label>
                        <input id="email" name="email" type="email" placeholder="<?= t('placeholder.email') ?>" required>

                        <label for="phone"><?= t('devis.phone') ?></label>
                        <input id="phone" name="phone" type="text" placeholder="<?= t('placeholder.phone') ?>" required>
                    </div>
                </div>
                <div class="form-submit">
                    <button type="submit"><?= t('devis.submit') ?></button>
                </div>
                <div class="legal-message">
                    <?= t('devis.legal') ?> <a href="<?= page('mentions')->url() ?>">la-maison-du-print.fr/mentions</a>.
                </div>

            </form>

            <?php if (!empty($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= html($error) ?></li>
                    <?php endforeach ?>
                </ul>
            <?php elseif ($success): ?>
                <p>Formulaire soumis avec succès !</p>
            <?php endif ?>

        </main>

        <?= snippet('footer') ?>
        <script src="<?= url('assets/js/transition.js') ?>"></script>
    </body>