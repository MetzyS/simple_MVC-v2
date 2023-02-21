<?php
session_start();
// Cette page récupère l'id du jeu via le lien envoyé par le bouton Ajouter au Panier
// Cet ID sera stocké dans la session $_SESSION['panier'] et l'utilisateur sera redirigé vers la page de jeu
$ajouter = filter_input(INPUT_GET, 'id');
if (in_array($ajouter, $_SESSION['panier']))
{
    header('Location: /www/simple_MVC-v2/public/jeu/show/');
} else {
    $_SESSION['panier'][] = $ajouter;
    header('Location: /www/simple_MVC-v2/public/jeu/show/');
}