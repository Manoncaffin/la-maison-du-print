<?php

return function ($kirby, $pages, $page) {
    $errors = [];
    $success = false;

    if ($kirby->request()->is('POST')) {
        // Récupérer les données du formulaire
        $data = [
            'model'       => $kirby->request()->get('model'),
            'background'  => $kirby->request()->get('background'),
            'articles'    => $kirby->request()->get('articles'),
            'color'       => $kirby->request()->get('color'),
            'to_print'    => $kirby->request()->get('to_print'),
            'description' => $kirby->request()->get('description'),
            'files'       => $_FILES['files'] ?? null,
            'name'        => $kirby->request()->get('name'),
            'firstname'   => $kirby->request()->get('firstname'),
            'email'       => $kirby->request()->get('email'),
            'phone'       => $kirby->request()->get('phone'),
        ];

        // Validation des champs obligatoires
        if (empty($data['model'])) $errors[] = 'Le champ "Choix du modèle" est requis.';
        if (empty($data['background'])) $errors[] = 'Le champ "Choix du fond" est requis.';
        if (empty($data['articles']) || !is_numeric($data['articles'])) $errors[] = 'Le champ "Nombre d\'articles" est requis et doit être un nombre.';
        if (empty($data['color'])) $errors[] = 'Le champ "Nombre de couleurs" est requis.';
        if (empty($data['to_print'])) $errors[] = 'Le champ "Zone à imprimer" est requis.';
        if (empty($data['name'])) $errors[] = 'Le champ "Nom du client" est requis.';
        if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) $errors[] = 'Le champ "Email" est invalide.';
        if (empty($data['phone'])) $errors[] = "Le téléphone est requis.";

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
                                . "Email : {$data['email']}\n"
                                . "Téléphone : {$data['phone']}\n\n"
                                . "Modèle : {$data['model']}\n"
                                . "Fond : {$data['background']}\n"
                                . "Nombre d'articles : {$data['articles']}\n"
                                . "Nombre de couleurs : {$data['color']}\n"
                                . "Zone à imprimer : {$data['to_print']}\n\n"
                                . "Description du projet :\n{$data['description']}\n\n"
                                . (!empty($uploadedFiles) ? "Fichiers joints : " . implode(", ", $uploadedFiles) : "Aucun fichier joint."),
                ]);
            } catch (Exception $e) {
                $errors[] = "Erreur lors de l'envoi de l'email : " . $e->getMessage();
            }
        }
    }

    if ($success) {
        header("Location: " . url('redirection'));
        exit();
    }

    return compact('errors', 'success');
    
};
