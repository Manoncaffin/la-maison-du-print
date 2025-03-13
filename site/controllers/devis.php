<?php

return function ($kirby, $pages, $page) {
    $errors      = [];
    $success     = false;
    $data        = [];
    $attachments = [];

    // Traitement du formulaire uniquement si la méthode est POST et le bouton submit a été cliqué
    if ($kirby->request()->is('POST') && get('submit')) {

        // Vérification CSRF : comparer le token envoyé avec celui généré par Kirby
        if (get('csrf_token') !== csrf()) {
            $errors[] = 'Erreur de sécurité. Veuillez réessayer.';
        }

        // Récupération des données du formulaire
        $data = [
            'model'       => get('model'),
            'background'  => get('background'),
            'articles'    => get('articles'),
            'color'       => get('color'),
            'to_print'    => get('to_print'),
            'description' => get('description'),
            'files'       => $_FILES['files'] ?? null,
            'company'     => get('company'),
            'siret'       => get('siret'),
            'name'        => get('name'),
            'firstname'   => get('firstname'),
            'email'       => get('email'),
            'phone'       => get('phone'),
        ];

        // Définition des messages d'erreur pour chaque champ
        $messages = [
            'model'       => 'Le champ "Choix du modèle" est requis.',
            'background'  => 'Le champ "Choix du fond" est requis.',
            'articles'    => 'Le champ "Nombre d\'articles" est requis et doit être un nombre.',
            'color'       => 'Le champ "Nombre de couleurs" est requis.',
            'to_print'    => 'Le champ "Zone à imprimer" est requis.',
            'company'     => 'Le champ "Votre entreprise" est requis.',
            'siret'       => 'Le champ "Numéro de SIRET" est requis.',
            'name'        => 'Le champ "Nom" est requis.',
            'firstname'   => 'Le champ "Prénom" est requis.',
            'email'       => 'Le champ "Email" est invalide.',
            'phone'       => 'Le champ "Numéro de téléphone" est requis.'
        ];

        // Validation des champs obligatoires
        foreach ($messages as $field => $message) {
            if (empty($data[$field])) {
                $errors[] = $message;
            } elseif ($field === 'articles' && !is_numeric($data['articles'])) {
                $errors[] = $messages['articles'];
            } elseif ($field === 'email' && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = $messages['email'];
            }
        }

        // Gestion des uploads (si des fichiers sont présents)
        if (!empty($data['files']['name'][0])) {
            $uploadDir = kirby()->roots()->media() . '/uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $maxFileSize        = 2 * 1024 * 1024; // 2 Mo
            $allowedExtensions  = ['pdf', 'ai'];

            foreach ($data['files']['tmp_name'] as $key => $tmp_name) {
                $originalName = $data['files']['name'][$key];
                $fileSize     = $data['files']['size'][$key];
                $fileError    = $data['files']['error'][$key];
                $extension    = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

                if ($fileError === UPLOAD_ERR_OK) {
                    if (!in_array($extension, $allowedExtensions)) {
                        $errors[] = "Le fichier $originalName n'est pas au format autorisé (PDF ou AI).";
                        continue;
                    }
                    if ($fileSize > $maxFileSize) {
                        $errors[] = "Le fichier $originalName dépasse la taille maximale autorisée (2 Mo).";
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

        // Si aucune erreur, envoyer l'email
        if (empty($errors)) {
            try {
                $kirby->email([
                    'to'          => 'atelier@lamaisonduprint.fr',
                    'from'        => 'atelier@lamaisonduprint.fr',
                    'subject'     => 'Nouvelle demande de devis',
                    'body'        => "Nom : {$data['name']} {$data['firstname']}\n"
                        . "Email : {$data['email']}\n"
                        . "Téléphone : {$data['phone']}\n\n"
                        . "Modèle : {$data['model']}\n"
                        . "Fond : {$data['background']}\n"
                        . "Nombre d'articles : {$data['articles']}\n"
                        . "Nombre de couleurs : {$data['color']}\n"
                        . "Zone à imprimer : {$data['to_print']}\n\n"
                        . "Description du projet :\n{$data['description']}\n\n",
                    'attachments' => $attachments
                ]);
                $success = true;
            } catch (Exception $e) {
                $errors[] = "Erreur lors de l'envoi de l'email : " . $e->getMessage();
            }
        }
    }

    // Redirection en cas de succès
    if ($success) {
        header("Location: " . url('redirection'));
        exit();
    }

    return compact('errors', 'success', 'data');
};
