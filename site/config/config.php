<?php

return [
    // 'url' => 'https://lamaisonduprint.fr',
    'url' => 'http://localhost:8888/la-maison-du-print/',
    'languages' => true,
    'home' => 'home',
    // Active debug mode
    'debug' => true,
    'cache' => false,

    // Auto arrange kirbytext presets
    'smartypants' => true,

    // Authentification methods
    'markdown' => [
        'extra' => true
    ],

    // Authentification methods
    'auth' => [
        'methods' => ['password', 'password-reset']
    ],


    'upload' => [
        'maxsize' => 50 * 1024 * 1024,
        'types' => ['mp4', 'mov', 'avi', 'svg', 'png', 'jpg', 'jpeg']
    ],

    'content' => [
        'allowedMimeTypes' => [
            'image/svg+xml' => 'svg',
            'image/png' => 'png',
            'image/jpeg' => 'jpg'
        ]
    ],

    'panel' => [
        'install' => true,
        'slug' => 'panel',
        'language' => 'fr',
        'css' => 'assets/css/panel.css'
    ],

    //Image srcsets thumbs presets
    'thumbs' => [
        'srcsets' => [
            'default' => [
                '800w' => ['width' => 800, 'quality' => 80],
                '1024w' => ['width' => 1024, 'quality' => 80],
                '1440w' => ['width' => 1440, 'quality' => 80],
                '2048w' => ['width' => 2048, 'quality' => 80]
            ]
        ],
        'format' => 'webp'
    ],
    'config' => [
        'instagram_url' => 'https://www.instagram.com/lamaison.duprint/'
    ],

    'hooks' => [
        'file.create:before' => function ($file) {
            // Limiter les dimensions d'image, par exemple 2000x2000px
            if ($file->type() === 'image') {
                $dimensions = $file->dimensions();
                if ($dimensions->width() > 2000 || $dimensions->height() > 2000) {
                    throw new Exception('L\'image dépasse les dimensions autorisées (2000x2000px)');
                }
            }
        }
    ],
    'languages' => [
        'fr' => [
            'name' => 'Français',
            'default' => true,
            'locale' => 'fr_FR',
            'url' => '/',
        ],
        'en' => [
            'name' => 'English',
            'locale' => 'en_GB',
            'url' => '/en',
        ],
    ],
    'email' => [
        'transport' => [
            'type' => 'smtp',
            'host' => 'ssl0.ovh.net', 
            'port' => 587, 
            'security' => 'tls',
            'auth' => true,
            'username' => 'atelier@lamaisonduprint.fr',
            'password' => 'Kaboul2992' 
        ]
    ]
];
