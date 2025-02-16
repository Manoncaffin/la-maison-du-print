<body class="page-enter">
<?php snippet('header') ?>
<?= snippet('head') ?>

<?php var_dump($errors, $success); ?>
<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') { var_dump($_POST, $_FILES); } ?>


<body>

    <main class="container_devis page-enter">
        <?php $devis = page('devis'); ?>

        <div class="title-page">
            <h1>DEMANDE DE DEVIS</h1>
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
            </div>
        <?php endif; ?>

        <form action="<?= $page->url() ?>" method="post" enctype="multipart/form-data">
            <!-- Section: Votre commande -->
            <div class="first">
                <div class="form-section-one">
                    <h2>Votre commande</h2>
                    <p class="icon-time"><i class="fa fa-hourglass-start"></i> Cela prend 5+ minutes</p>
                    <label for="model">Choix du modèle</label>
                    <input id="model" name="model" type="text" placeholder="Sélectionnez une option" required>

                    <label for="background">Choix du fond</label>
                    <input id="background" name="background" type="text" placeholder="Sélectionnez une option" required>

                    <label for="articles">Nombre d'article</label>
                    <input id="articles" name="articles" type="number" placeholder="Ex : 100" required>

                    <label for="color">Nombre de couleur</label>
                    <input id="color" name="color" type="text" placeholder="Sélectionnez une option" required>

                    <label for="to_print">Zone à imprimer</label>
                    <input id="to_print" name="to_print" type="text" placeholder="Sélectionnez une option" required>

                    <label for="description">Description du projet</label>
                    <textarea id="description" name="description" placeholder="Détaillez votre projet ici si besoin"></textarea>

                    <label for="files">Fichiers à transférer</label>
                    <input id="files" name="files[]" type="file" multiple required accept=".pdf,.ai">
                </div>
                <!-- Section: Informations client -->
                <div class="form-section-two">
                    <h2>Vos informations</h2>
                    <label for="name">Nom</label>
                    <input id="name" name="name" type="text" placeholder="Entrez votre nom" required>

                    <label for="firstname">Prénom</label>
                    <input id="firstname" name="firstname" type="text" placeholder="Entrez votre prénom" required>

                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" placeholder="Entrez votre email" required>

                    <label for="phone">Numéro de téléphone</label>
                    <input id="phone" name="phone" type="text" placeholder="Entrez votre numéro" required>
                </div>
                </div>
                <div class="form-submit">
                    <button type="submit">Envoyer le formulaire</button>
                </div>
                <div class="legal-message">
                En tant que responsable de traitement, La Maison du print met en œuvre un traitement de données personnelles vous concernant aux fins de gestion de vos demandes de prise de contact et de réponse à vos devis. Pour en savoir plus sur la gestion de vos données et de vos droits par La Maison du print, vous êtes invité·es à vous rendre à l’adresse suivante : <a href="<?= page('mentions')->url() ?>">la-maison-du-print.fr/mentions</a>. 
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
