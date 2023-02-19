<?php
session_start();
// echo '<pre>';
// print_r($_SERVER);

// init.php initialise les configurations requises
// on appelle ça "bootstrap"
require_once '../app/init.php';
// Crée une nouvelle instance de la classe App
$app = new App;
