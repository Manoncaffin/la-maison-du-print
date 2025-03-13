<?php

// Charger les variables d'environnement
require_once 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Charger Kirby après avoir chargé les variables d'environnement
require_once 'kirby/bootstrap.php';

echo (new Kirby)->render();
