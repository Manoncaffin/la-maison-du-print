<?php

return [
    // Active debug mode
    'debug' => true,

    // Activate multiples languages and auto detect
    // 'languages' => [
    //   'detect' => true
    // ],

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
    'panel' => [
        'install' => true,
        'slug' => 'panel',
        'language' => 'fr',
        'css' => 'assets/css/panel.css'
    ]
];