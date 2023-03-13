<?php
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include_once '../app/views/template/head.php';
include_once '../app/views/template/navigation.php';

use App\Core\App;
use App\Validators\Verification;

if (!isset($_SESSION['utilisateur'])) {
    $_SESSION['utilisateur'] = null;
}
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

// init.php initialise les configurations requises
// on appelle ça "bootstrap"
require_once '../app/init.php';
// Crée une nouvelle instance de la classe App
$app = new App;

if (isset($data['message'])) {
    echo '<p class="message">' . $data['message'] . '</p>';
}
