<?php
session_start();
// Cette page récupère l'id du jeu via le lien envoyé par le bouton Retirer au Panier
// Cet ID sera retirée de la session $_SESSION['panier'] et l'utilisateur sera redirigé vers la page panier
$retirer = filter_input(INPUT_GET, 'id');
if ($retirer) {
    if (in_array($retirer, $_SESSION['panier'])) {
        $emplacement = array_search($retirer, $_SESSION['panier']);
        unset($_SESSION['panier'][$emplacement]);
        header('Location: /www/simple_MVC-v2/public/panier/show/');
    } else {
        header('Location: /www/simple_MVC-v2/public/panier/show/');
    }
}
