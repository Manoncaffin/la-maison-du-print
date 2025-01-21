<?php snippet('header') ?>
<?= snippet('head') ?>

<body>

<main class="container_devis">
    <?php $devis = page('devis'); ?>

    <div class="title-page">
        <h1>DEMANDE DE DEVIS</h1>
        <div class="border"></div>
    </div>

<form action="<?= $page->url() ?>" method="post" enctype="multipart/form-data">
    <label for="model">Choix du modèle :</label>
    <input id="model" name="model" type="text" required>

    <label for="background">Choix du fond :</label>
    <input id="background" name="background" type="text" required>

    <label for="articles">Nombre d'article :</label>
    <input id="articles" name="articles" type="number" required>

    <label for="color">Nombre de couleur :</label>
    <input id="color" name="color" type="text" required>

    <label for="files">Fichiers à transférer :</label>
    <input id="files" name="files[]" type="file" multiple required accept=".pdf,.ai">

    <label for="name">Nom du client :</label>
    <input id="name" name="name" type="text" required>

    <label for="email">Email :</label>
    <input id="email" name="email" type="email" required>

    <button type="submit">Envoyer</button>
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
