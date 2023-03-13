<?php

session_start();
if (isset($_SESSION['utilisateur']['id_client'])) {
    header('Location: /www/simple_MVC-v2/public/compte/informations/');
}


// Cette page récupère les informations contenus dans les champs de saisie de la page "inscription.php"
// Ces infos seront stockés dans la session $_SESSION['client']
// Puis validation (regex) via App\Validators\Verification
$array = ['nom', 'prenom', 'mail', 'mot_de_passe', 'adresse', 'ville', 'cp'];
$nom = filter_input(INPUT_POST, 'nom');
$prenom = filter_input(INPUT_POST, 'prenom');
$mail = filter_input(INPUT_POST, 'mail');
$mdp = filter_input(INPUT_POST, 'mdp');
$adresse = filter_input(INPUT_POST, 'adresse');
$ville = filter_input(INPUT_POST, 'ville');
$cp = filter_input(INPUT_POST, 'cp');


$_SESSION['client'] = [$nom, $prenom, $mail, $mdp, $adresse, $ville, $cp];
$_SESSION['client'] = array_combine($array, $_SESSION['client']);


header('Location: /www/simple_MVC-v2/public/compte/create/');
