<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', '/Applications/MAMP/logs/php_error.log');
error_reporting(E_ALL);

error_log("🚀 Test d'erreur sur la page devis !");
echo "✅ Test d'affichage : Si tu vois ce message, PHP fonctionne !";

require '../../vendor/autoload.php'; // Inclure l'autoloader de Composer depuis le répertoire racine

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;

// Afficher le chemin actuel
error_log('Current directory: ' . __DIR__);

// Charger les variables d'environnement depuis le répertoire racine
$dotenv = Dotenv::createImmutable('/Applications/MAMP/htdocs/la-maison-du-print');
$dotenv->safeLoad(); // Évite les erreurs si le fichier n'existe pas
putenv("MAIL_HOST=" . $_ENV['MAIL_HOST']);
putenv("MAIL_PORT=" . $_ENV['MAIL_PORT']);
putenv("MAIL_USERNAME=" . $_ENV['MAIL_USERNAME']);
putenv("MAIL_PASSWORD=" . $_ENV['MAIL_PASSWORD']);
putenv("MAIL_SECURITY=" . $_ENV['MAIL_SECURITY']);
var_dump(getenv("MAIL_HOST"));


if (!file_exists('/Applications/MAMP/htdocs/la-maison-du-print/.env')) {
    exit("⚠️ Erreur : Le fichier .env n'existe pas !");
}

if (!getenv('MAIL_HOST')) {
    exit("⚠️ Erreur : Les variables d'environnement ne sont pas chargées !");
}

// Vérifiez que les variables d'environnement sont chargées
error_log('MAIL_HOST: ' . getenv('MAIL_HOST'));
error_log('MAIL_PORT: ' . getenv('MAIL_PORT'));
error_log('MAIL_USERNAME: ' . getenv('MAIL_USERNAME'));
error_log('MAIL_PASSWORD: ' . getenv('MAIL_PASSWORD'));
error_log('MAIL_SECURITY: ' . getenv('MAIL_SECURITY'));
$mail = new PHPMailer(true);

try {
    // Configuration du serveur SMTP
    $mail->isSMTP();
    $mail->Host       = getenv('MAIL_HOST');
    $mail->SMTPAuth   = true;
    $mail->Username   = getenv('MAIL_USERNAME');
    $mail->Password   = getenv('MAIL_PASSWORD');
    $mail->SMTPSecure = getenv('MAIL_SECURITY');
    $mail->Port       = getenv('MAIL_PORT');

    // Destinataires
    $mail->setFrom('atelier@lamaisonduprint.fr', 'La Maison du Print');
    $mail->addAddress('atelier@lamaisonduprint.fr', 'Atelier');

    // Contenu
    $mail->isHTML(true);
    $mail->Subject = 'Test Email';
    $mail->Body    = 'Ceci est un email de test.';
    $mail->AltBody = 'Ceci est un email de test en texte brut.';

    // Envoyer l'email
    $mail->send();
    echo 'Message envoyé';
} catch (Exception $e) {
    echo "Erreur lors de l'envoi de l'email : {$mail->ErrorInfo}";
}


// devis.php 
// les permissions de .env sont correctes
// les variblaes d'environnement fonctionnent dans test_mail.php et non dans devis.php
// Mailtrap OK