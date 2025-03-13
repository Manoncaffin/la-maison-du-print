<?php

return function ($kirby, $pages, $page) {
    $errors      = [];
    $success     = false;
    $data        = [];
    $attachments = [];

    if ($kirby->request()->is('POST')) {
        // if ($kirby->user() && $kirby->user()->isAdmin()) {
        //     var_dump($_POST); // DEBUG : à retirer en production
        // }

        // Vérification CSRF
        if (get('csrf_token', 'POST') !== csrf()) {
            $errors[] = 'Erreur de sécurité. Veuillez réessayer.';
            return compact('errors', 'success', 'data');
        }

        // Récupération des données
        $data = [
            'model'       => get('model', 'POST'),
            'background'  => get('background', 'POST'),
            'articles'    => get('articles', 'POST'),
            'color'       => get('color', 'POST'),
            'to_print'    => get('to_print', 'POST'),
            'description' => get('description', 'POST'),
            'files'       => !empty($_FILES['files']['name'][0]) ? $_FILES['files'] : null,
            'company'     => get('company', 'POST'),
            'siret'       => get('siret', 'POST'),
            'name'        => get('name', 'POST'),
            'firstname'   => get('firstname', 'POST'),
            'email'       => get('email', 'POST'),
            'phone'       => get('phone', 'POST'),
        ];

        // Validation des champs
        $messages = [
            'model'       => 'Le champ "Choix du modèle" est requis.',
            'background'  => 'Le champ "Choix du fond" est requis.',
            'articles'    => 'Le champ "Nombre d\'articles" est requis et doit être un nombre.',
            'color'       => 'Le champ "Nombre de couleurs" est requis.',
            'to_print'    => 'Le champ "Zone à imprimer" est requis.',
            'company'     => 'Le champ "Votre entreprise" est requis.',
            'siret'       => 'Le champ "Numéro de SIRET" est invalide.',
            'name'        => 'Le champ "Nom" est requis.',
            'firstname'   => 'Le champ "Prénom" est requis.',
            'email'       => 'Le champ "Email" est invalide.',
            'phone'       => 'Le champ "Numéro de téléphone" est requis.'
        ];

        foreach ($messages as $field => $message) {
            if (empty($data[$field])) {
                $errors[] = $message;
            } elseif ($field === 'articles' && !is_numeric($data['articles'])) {
                $errors[] = $messages['articles'];
            } elseif ($field === 'email' && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = $messages['email'];
            } elseif ($field === 'siret' && !preg_match('/^\d{14}$/', $data['siret'])) {
                $errors[] = $messages['siret'];
            }
        }

        // Gestion des fichiers
        if (!empty($data['files'])) {
            $uploadDir = kirby()->roots()->media() . '/uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $maxFileSize = 2 * 1024 * 1024;
            $allowedExtensions = ['pdf', 'ai', 'jpeg', 'jpg', 'png'];

            foreach ($data['files']['tmp_name'] as $key => $tmp_name) {
                $originalName = $data['files']['name'][$key];
                $fileSize     = $data['files']['size'][$key];
                $fileError    = $data['files']['error'][$key];
                $extension    = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

                if ($fileError === UPLOAD_ERR_OK) {
                    if (!in_array($extension, $allowedExtensions)) {
                        $errors[] = "Le fichier $originalName n'est pas au format autorisé.";
                        continue;
                    }
                    if ($fileSize > $maxFileSize) {
                        $errors[] = "Le fichier $originalName dépasse la taille maximale autorisée.";
                        continue;
                    }
                    $filePath = $uploadDir . basename($originalName);
                    if (move_uploaded_file($tmp_name, $filePath)) {
                        $attachments[] = $filePath;
                    } else {
                        $errors[] = "Erreur lors du téléchargement du fichier $originalName.";
                    }
                } else {
                    $errors[] = "Erreur avec le fichier $originalName.";
                }
            }
        }

        // Envoi d'email
        if (empty($errors)) {
            try {
                $kirby->email([
                    'to'          => 'atelier@lamaisonduprint.fr',
                    'from'        => 'atelier@lamaisonduprint.fr',
                    'subject'     => 'Nouvelle demande de devis',
                    'body'        => "<h2>Nouvelle demande de devis</h2>"
                                    . "<p><strong>Nom :</strong> {$data['name']} {$data['firstname']}</p>",
                    'attachments' => $attachments
                ]);

                go('redirection');

            } catch (Exception $e) {
                $errors[] = "Erreur lors de l'envoi de l'email : " . $e->getMessage();
            }
        }
    }

    return compact('errors', 'success', 'data');
};
