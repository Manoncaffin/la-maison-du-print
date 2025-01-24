<?php snippet('header') ?>
<?= snippet('head') ?>

<body>

    <main class="container_devis">
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
                <p><?= $devis->about()->kt() ?></p>
            </div>
        <?php endif; ?>

        <form action="<?= $page->url() ?>" method="post" enctype="multipart/form-data">
            <!-- Section: Votre commance -->
            <h2>Votre commande</h2>
            <p class="icon-time"><i class="fa fa-hourglass-start"></i> Cela prend 5+ minutes</p>
            <label for="model">Choix du modèle :</label>
            <input id="model" name="model" type="text" placeholder="Ex : T-shirt oversize lourd 240 g" required>

            <label for="background">Choix du fond :</label>
            <input id="background" name="background" type="text" placeholder="Ex : T-shirt foncé" required>

            <label for="articles">Nombre d'article :</label>
            <input id="articles" name="articles" type="number" placeholder="Ex : 100" required>

            <label for="color">Nombre de couleur :</label>
            <input id="color" name="color" type="text" placeholder="Ex : Rouge, vert" required>

            <label for="to_print">Zone à imprimer :</label>
            <input id="to_print" name="to_print" type="text" placeholder="Ex : Centre poitrine" required>

            <label for="description">Description du projet :</label>
            <textarea id="description" name="description" placeholder="Détaillez votre projet ici si besoin"></textarea>

            <label for="files">Fichiers à transférer :</label>
            <input id="files" name="files[]" type="file" multiple required accept=".pdf,.ai">

            <!-- Section: Informations client -->
            <h2>Vos informations</h2>
            <label for="name">Nom :</label>
            <input id="name" name="name" type="text" placeholder="Votre nom" required>

            <label for="firstname">Prénom :</label>
            <input id="firstname" name="firstname" type="text" placeholder="Votre prénom" required>

            <label for="email">Email :</label>
            <input id="email" name="email" type="email" placeholder="Votre email" required>

            <label for="phone">Numéro de téléphone :</label>
            <input id="phone" name="phone" type="text" placeholder="Votre numéro" required>

            <button type="submit">Envoyer le formulaire</button>
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
</body>