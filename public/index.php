<?php
session_start();

use App\Core\App;
// init.php initialise les configurations requises
// on appelle ça "bootstrap"
require_once '../app/init.php';
// Crée une nouvelle instance de la classe App
$app = new App;
