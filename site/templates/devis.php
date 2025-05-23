<body class="page-enter <?= $page->slug() ?>">
    <?php snippet('header') ?>
    <?php snippet('head') ?>

    <?php
    $errors = [];
    $success = false;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (empty($errors)) {
            $success = true;
        }
    }
    ?>

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

            <form id="devisForm" action="devis" method="post" enctype="multipart/form-data">
                <input type="hidden" name="csrf_token" value="<?= csrf() ?>" />
                <!-- Section: Votre commande -->
                <div class="first">
                    <div class="form-section-one">
                        <h2><?= t('devis.order') ?></h2>
                        <label for="model"><?= t('devis.model') ?></label>
                        <select id="model" name="model" required>
                            <option value=""><?= t('placeholder.model') ?></option>
                            <?php foreach ($devis->choice_model()->toStructure() as $item): ?>
                                <option value="<?= $item->model() ?>"><?= $item->model() ?></option>
                            <?php endforeach; ?>
                        </select>

                        <label for="background"><?= t('devis.background') ?></label>
                        <select id="background" name="background" required>
                            <option value=""><?= t('placeholder.background') ?></option>
                            <?php foreach ($devis->choice_background()->toStructure() as $item): ?>
                                <option value="<?= $item->model() ?>"><?= $item->model() ?></option>
                            <?php endforeach; ?>
                        </select>

                        <label for="articles"><?= t('devis.articles') ?></label>
                        <input id="articles" name="articles" type="number" placeholder="<?= t('placeholder.articles') ?>" required>

                        <label for="color"><?= t('devis.color') ?></label>
                        <select id="color" name="color" required>
                            <option value=""><?= t('placeholder.color') ?></option>
                            <?php foreach ($devis->color_number()->toStructure() as $item): ?>
                                <option value="<?= $item->model() ?>"><?= $item->model() ?></option>
                            <?php endforeach; ?>
                        </select>

                        <label for="to_print"><?= t('devis.to_print') ?></label>
                        <select id="to_print" name="to_print" required>
                            <option value=""><?= t('placeholder.to_print') ?></option>
                            <?php foreach ($devis->to_print()->toStructure() as $item): ?>
                                <option value="<?= $item->model() ?>"><?= $item->model() ?></option>
                            <?php endforeach; ?>
                        </select>

                        <label for="description"><?= t('devis.description') ?></label>
                        <textarea id="description" name="description" placeholder="<?= t('placeholder.description') ?>"></textarea>

                        <label for="files" class="custom-file-upload"><?= t('devis.files') ?></label>
                        <input id="files" name="files[]" type="file" accept=".pdf,.ai, jpeg, jpg, png">
                    </div>
                    <!-- Section: Informations client -->
                    <div class="form-section-two">
                        <h2><?= t('devis.info') ?></h2>
                        <label for="name"><?= t('devis.company') ?></label>
                        <input id="company" name="company" type="text" placeholder="<?= t('placeholder.company') ?>" required>

                        <label for="name"><?= t('devis.siret') ?></label>
                        <input id="siret" name="siret" type="text" placeholder="<?= t('placeholder.siret') ?>" required>

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
                    <?= t('devis.legal') ?>
                </div>

            </form>

        </main>

        <?= snippet('footer') ?>
        <script src="<?= url('assets/js/transition.js') ?>"></script>
    </body>