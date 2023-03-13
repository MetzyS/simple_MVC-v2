<?php
session_start();
if (!isset($_SESSION['utilisateur'])) {
    header('Location: /www/simple_MVC-v2/app/views/template/404.php');
}
if (isset($_SESSION['modif'])) {
    unset($_SESSION['modif']);
}

$nom = filter_input(INPUT_POST, 'nom');
$prenom = filter_input(INPUT_POST, 'prenom');
$mail = filter_input(INPUT_POST, 'mail');
$adresse = filter_input(INPUT_POST, 'adresse');
$ville = filter_input(INPUT_POST, 'ville');
$cp = filter_input(INPUT_POST, 'cp');

$_SESSION['modif'] = [];
$array = ['nom', 'prenom', 'mail', 'adresse', 'ville', 'cp'];
$_SESSION['modif'] = [$nom, $prenom, $mail, $adresse, $ville, $cp];
$_SESSION['modif'] = array_combine($array, $_SESSION['modif']);

header('Location: /www/simple_MVC-v2/public/compte/modification/');
