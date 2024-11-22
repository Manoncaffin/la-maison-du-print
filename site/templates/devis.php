<?php 

$devis = page('devis');


$choice_model = $devis->formulaire()->toStructure()->first()->model(); // Récupère le premier élément de la structure "choice_model"
$choice_background = $devis->formulaire()->toStructure()->first()->background(); // Idem pour "choice_background"
$model_number = $devis->formulaire()->model_number()->value();
$color_number = $devis->formulaire()->color_number()->value();
$to_print = $devis->formulaire()->toStructure()->first()->to_print(); // Pour la zone à imprimer
$type_textile = $devis->formulaire()->toStructure()->first()->type_textile(); // Textile
$project_description = $devis->formulaire()->project_description()->value();
$client_name = $devis->formulaire()->client_name()->value();
$client_firstname = $devis->formulaire()->client_firstname()->value();
$client_email = $devis->formulaire()->client_email()->value();
$client_number = $devis->formulaire()->client_number()->value();

?>

<?php snippet('header') ?>

<h1><?= $devis->title() ?></h1>

<p><strong>Choix du modèle :</strong> <?= $page->choice_model()->kirbytext() ?></p>
<p><strong>Choix du fond :</strong> <?= $page->choice_background()->kirbytext() ?></p>
<p><strong>Nombre d'article :</strong> <?= $page->model_number() ?></p>
<p><strong>Nombre de couleur :</strong> <?= $page->color_number() ?></p>
<p><strong>Zone à imprimer :</strong> <?= $page->to_print()->kirbytext() ?></p>
<p><strong>Type de textile :</strong> <?= $page->type_textile()->kirbytext() ?></p>
<p><strong>Description du projet :</strong> <?= $page->project_description()->kirbytext() ?></p>
<p><strong>Avez-vous un fichier à nous transmettre ?</strong> <?= $page->send_files() ?></p>
<p><strong>Nom :</strong> <?= $page->client_name()->kirbytext() ?></p>
<p><strong>Prénom :</strong> <?= $page->client_firstname()->kirbytext() ?></p>
<p><strong>Email</strong> <?= $page->client_email()->kirbytext() ?></p>
<p><strong>Numéro</strong> <?= $page->client_number()->kirbytext() ?></p>

<?php snippet('footer') ?>
