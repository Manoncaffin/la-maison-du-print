<?php

require 'kirby/bootstrap.php';

$kirby = new Kirby(); // Initialise Kirby

try {
    $kirby->email([
        'to'      => 'TON_EMAIL_PERSONNEL@exemple.com', 
        'from'    => 'atelier@lamaisonduprint.fr',
        'subject' => 'Test SMTP',
        'body'    => 'Test d’envoi d’email via OVH'
    ]);
    echo "Email envoyé avec succès !";
} catch (Exception $e) {
    echo "Erreur lors de l'envoi de l'email : " . $e->getMessage();
}

