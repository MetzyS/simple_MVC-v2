<?php
if (isset($_SESSION['modif'])) {
    unset($_SESSION['modif']);
}

if (isset($_SESSION['client'])) {

    $_SESSION['client'] = $data;


    // Extrait les informations de client pour les stocker dans Utilisateur
    foreach ($_SESSION['client']['client'] as $key => $value) {
        $_SESSION['utilisateur'][$key] = $value;
    }
    $_SESSION['utilisateur']['id_client'] = "";
    if (isset($data['new_client'])) {
        $_SESSION['utilisateur']['id_client'] = $data['new_client']['1']['id_client'];
    }
    if (isset($data['client']['client']['id_client'])) {
        $_SESSION['utilisateur']['id_client'] = $data['client']['client']['id_client'];
    }

    if (isset($data['message'])) {
        $message = $data['message'];
        unset($data['message']);
    }
    if (isset($data['erreur'])) {
        $erreur = $data['erreur'];
        unset($data['erreur']);
    }
    unset($_SESSION['client']);
}

if (isset($data['new'])) {
    unset($_SESSION['utilisateur'][0]);
    foreach ($data['client'][0] as $key => $value) {
        $_SESSION['utilisateur'][0][$key] = $value;
    }
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

if (isset($data['confirmation'])) {
    echo '<p class="message">' . $data['confirmation'] . '</p>';
}

if (isset($data['erreur'])) {
    echo '<p class="erreur">' . $data['erreur'] . '</p>';
    unset($data['erreur']);
}

?>
<h2>Historique des commandes: </h2>

<?php if (empty($data['commandes'])) {
    echo 'Aucune commande passé';
} else {
    echo '<table class="tableau">
    <thead>
        <tr>
            <td class="tableau">Commande n°</td>
            <td class="tableau">Nom du jeu</td>
            <td class="tableau">Prix</td>
            <td class="tableau">Date</td>
        </tr>
    </thead>
    <tbody>';


    foreach ($data['commandes'] as $key => $value) {
        echo '<tr>';
        foreach ($value as $keys => $values) {
            echo '<td class="tableau">';
            echo ($values);
            echo '</td>';
        }
        echo '</tr>';
    }
    echo '    </tbody>
</table>';
}
?>

<h2>Informations de : <?php echo $_SESSION['utilisateur'][0]['prenom_client'] ?></h2>

<form action="/www/simple_MVC-v2/app/views/compte/modification.php" method="POST">
    <fieldset>
        <legend>Modifier ses informations</legend>
        <div class="input-container">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" value="<?= $_SESSION['utilisateur'][0]['nom_client'] ?>" maxlength="45" required>
        </div>
        <div class="input-container">
            <label for="prenom">Prenom</label>
            <input type="text" name="prenom" id="prenom" value="<?= $_SESSION['utilisateur'][0]['prenom_client'] ?>" maxlength="45" required>
        </div>
        <div class="input-container">
            <label for="mail">Mail</label>
            <input type="text" name="mail" id="mail" value="<?= $_SESSION['utilisateur'][0]['mail'] ?>" maxlength="90" required>
        </div>
        <div class="input-container">
            <label for="adresse">Adresse</label>
            <input type="text" name="adresse" id="adresse" value="<?= $_SESSION['utilisateur'][0]['adresse'] ?>" maxlength="140" required>
        </div>
        <div class="input-container">
            <label for="ville">Ville</label>
            <input type="text" name="ville" id="ville" value="<?= $_SESSION['utilisateur'][0]['ville'] ?>" maxlength="45" required>
        </div>
        <div class="input-container">
            <label for="cp">CP</label>
            <input type="text" name="cp" id="cp" value="<?= $_SESSION['utilisateur'][0]['cp'] ?>" maxlength="5" required>
        </div>
        <button type="submit">Modifier vos informations</button>
    </fieldset>
</form>