<?php
session_start();

if (isset($_SESSION['client'])) {
    unset($_SESSION['client']);
}
if (isset($_SESSION['utilisateur'])) {
    unset($_SESSION['utilisateur']);
}

$mail = filter_input(INPUT_POST, 'mail');
$mdp = filter_input(INPUT_POST, 'mdp');

$_SESSION['client'] = [];
$array = ['mail', 'mot_de_passe'];
$_SESSION['client'] = [$mail, $mdp];
$_SESSION['client'] = array_combine($array, $_SESSION['client']);


header('Location: /www/simple_MVC-v2/public/compte/connect/');
