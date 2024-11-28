<?php

return function ($page) {
    $errors = [];
    $success = false;

    // Vérifiez si une requête POST est soumise
    if (kirby()->request()->is('POST')) {
        // Récupération des données soumises
        $data = [
            'model' => get('model'),
            'background' => get('background'),
            'articles' => get('articles'),
            'color' => get('color'),
            'files' => $_FILES['files'] ?? [],
            'name' => get('name'),
            'email' => get('email')
        ];

        // Validation des champs
        if (empty($data['model'])) {
            $errors[] = 'Le champ "Choix du modèle" est requis.';
        }
        if (empty($data['background'])) {
            $errors[] = 'Le champ "Choix du fond" est requis.';
        }
        if (empty($data['articles']) || !is_numeric($data['articles'])) {
            $errors[] = 'Le champ "Nombre d\'articles" est requis et doit être un nombre.';
        }
        if (empty($data['color'])) {
            $errors[] = 'Le champ "Nombre de couleurs" est requis.';
        }
        if (empty($data['name'])) {
            $errors[] = 'Le champ "Nom du client" est requis.';
        }
        if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Le champ "Email" est requis et doit être une adresse valide.';
        }
        if (empty($data['files']['name'][0])) {
            $errors[] = 'Vous devez télécharger au moins un fichier.';
        }

        // Si pas d'erreurs, traiter la soumission
        if (empty($errors)) {
            $success = true;

            // Logique pour traiter les fichiers ou envoyer les données ailleurs
            // Exemple : Créer une page Kirby avec les données du formulaire
            $page->createChild([
                'slug' => uniqid('devis-'),
                'template' => 'devis-entry',
                'content' => [
                    'model' => $data['model'],
                    'background' => $data['background'],
                    'articles' => $data['articles'],
                    'color' => $data['color'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                ]
            ]);
        }
    }

    return compact('errors', 'success');
};
