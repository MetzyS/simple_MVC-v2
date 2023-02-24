<?php
if (isset($_SESSION['client'])) {
    $_SESSION['client'] = $data;
    echo "<pre> SESSION['client']";
    var_dump($_SESSION['client']);
    echo '</pre>';
    // die();

    // Extrait les informations de client pour les stocker dans Utilisateur
    foreach ($_SESSION['client']['client'] as $key => $value) {
        $_SESSION['utilisateur'][$key] = $value;
        var_dump($key);
        echo '=';
        var_dump($value);
    }
    // $_SESSION['utilisateur'] = $_SESSION['client'];
    unset($_SESSION['client']);
    var_dump($data['message']);
    unset($data['message']);
}
?>

<h1>Bienvenue <?php var_dump($_SESSION['utilisateur']['nom']) ?></h1>