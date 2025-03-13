<?php

return function ($kirby, $page) {
    $errors = [];
    $success = false;

    if ($kirby->request()->is('POST') && get('submit')) {

        $alerts      = null;
        $attachments = [];
        
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

        // Règles de validation
        $rules = [
            'model'       => ['required'],
            'background'  => ['required'],
            'articles'    => ['required', 'numeric'],
            'color'       => ['required'],
            'to_print'    => ['required'],
            'company'     => ['required'],
            'siret'       => ['required'],
            'name'        => ['required'],
            'firstname'   => ['required'],
            'email'       => ['required', 'email'],
            'phone'       => ['required'],
        ];

        // Messages d'erreur associés
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
            'phone'       => 'Le champ "Numéro de téléphone" est requis.',
        ];

        // Validation des champs
        foreach ($rules as $field => $validation) {
            foreach ($validation as $rule) {
                if ($rule === 'required' && empty($data[$field])) {
                    $errors[] = $messages[$field];
                } elseif ($rule === 'numeric' && !is_numeric($data[$field])) {
                    $errors[] = $messages[$field];
                } elseif ($rule === 'email' && !filter_var($data[$field], FILTER_VALIDATE_EMAIL)) {
                    $errors[] = $messages[$field];
                }
            }
        }

        // Upload des fichiers (si présents)
        $uploadedFiles = [];
        if (!empty($data['files']['name'][0])) {
            $uploadDir = kirby()->roots()->media() . '/uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            foreach ($data['files']['tmp_name'] as $key => $tmp_name) {
                if ($data['files']['error'][$key] === UPLOAD_ERR_OK) {
                    $filePath = $uploadDir . basename($data['files']['name'][$key]);
                    move_uploaded_file($tmp_name, $filePath);
                    $uploadedFiles[] = $filePath;
                } else {
                    $errors[] = "Erreur lors du téléchargement du fichier.";
                }
            }
        }

        // Si pas d'erreurs, envoyer l'email
        if (empty($errors)) {
            $success = true;

            try {
                $kirby->email([
                    'to'      => 'atelier@lamaisonduprint.fr',
                    'from'    => 'atelier@lamaisonduprint.fr',
                    'subject' => 'Nouvelle demande de devis',
                    'body'    => "Nom : {$data['name']} {$data['firstname']}\n"
                                . "Entreprise : {$data['company']}\n"
                                . "Numéro de SIRET : {$data['siret']}\n"
                                . "Email : {$data['email']}\n"
                                . "Téléphone : {$data['phone']}\n\n"
                                . "Modèle : {$data['model']}\n"
                                . "Fond : {$data['background']}\n"
                                . "Nombre d'articles : {$data['articles']}\n"
                                . "Nombre de couleurs : {$data['color']}\n"
                                . "Zone à imprimer : {$data['to_print']}\n\n"
                                . "Description du projet :\n{$data['description']}\n\n"
                    ]);
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

    return compact('errors', 'success');
};
