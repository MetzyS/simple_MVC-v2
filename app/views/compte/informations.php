<?php

if (isset($_SESSION['client'])) {

    $_SESSION['client'] = $data;


    // Extrait les informations de client pour les stocker dans Utilisateur
    foreach ($_SESSION['client']['client'] as $key => $value) {
        $_SESSION['utilisateur'][$key] = $value;
    }
    $_SESSION['utilisateur']['id_client'] = "";
    $_SESSION['utilisateur']['id_client'] = $data['new_client']['1']['id_client'];

    $message = $data['message'];
    unset($_SESSION['client']);
    unset($data['message']);
}

// Redirige si l'utilisateur n'est pas connecté
if (!isset($_SESSION['utilisateur']['id_client'])) {
    header('Location: Location: /www/simple_MVC-v2/public/compte/inscription/');
}
?>

<?php
if (isset($message)) {
    echo '<p class="message">' . $message . ' Bienvenue!</p>';
}
?>


<h1>Informations de : <?php echo $_SESSION['utilisateur']['prenom'] ?></h1>

<form action="#" method="POST">
    <fieldset>
        <legend>Modifier ses informations</legend>
        <div class="input-container">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" value="<?= $_SESSION['utilisateur']['nom'] ?>">
        </div>
        <div class="input-container">
            <label for="prenom">Prenom</label>
            <input type="text" name="prenom" id="prenom" value="<?= $_SESSION['utilisateur']['prenom'] ?>">
        </div>
        <div class="input-container">
            <label for="mail">Mail</label>
            <input type="text" name="mail" id="mail" value="<?= $_SESSION['utilisateur']['mail'] ?>">
        </div>
        <div class="input-container">
            <label for="adresse">Adresse</label>
            <input type="text" name="adresse" id="adresse" value="<?= $_SESSION['utilisateur']['adresse'] ?>">
        </div>
        <div class="input-container">
            <label for="ville">Ville</label>
            <input type="text" name="ville" id="ville" value="<?= $_SESSION['utilisateur']['ville'] ?>">
        </div>
        <div class="input-container">
            <label for="cp">CP</label>
            <input type="text" name="cp" id="cp" value="<?= $_SESSION['utilisateur']['cp'] ?>">
        </div>
        <button type="submit">Modifier vos informations</button>
    </fieldset>
</form>