<?php
if (isset($_SESSION['utilisateur']['id_client'])) {
    header('Location: /www/simple_MVC-v2/public/compte/informations/');
};

?>
<h1>Formulaire d'inscription</h1>

<?php
if (isset($data['message'])) {
    echo '<p class="erreur">' . $data['message'] . '</p>';
}
?>

<form action="/www/simple_MVC-v2/app/views/compte/ajouter.php" method="post">
    <fieldset>
        <legend>Veuillez remplir les champs ci-dessous</legend>
        <div class="input-container">
            <label for="nom">Nom *</label>
            <input type="text" id="nom" name="nom" placeholder="Votre Nom" maxlength="45" <?php if (isset($_SESSION['client']['nom'])) {
                                                                                                echo 'value="' . $_SESSION['client']['nom'] . '"';
                                                                                            } ?> />
        </div>
        <div class="input-container">
            <label for="prenom">Prenom *</label>
            <input type="text" id="prenom" name="prenom" placeholder="Votre Prenom" maxlength="45" <?php if (isset($_SESSION['client']['prenom'])) {
                                                                                                        echo 'value="' . $_SESSION['client']['prenom'] . '"';
                                                                                                    } ?> />
        </div>
        <div class="input-container">
            <label for="mail">Mail *</label>
            <input type="email" id="mail" name="mail" placeholder="Votre Mail" maxlength="90" <?php if (isset($_SESSION['client']['mail'])) {
                                                                                                    echo 'value="' . $_SESSION['client']['mail'] . '"';
                                                                                                } ?> />
        </div>
        <div class="input-container">
            <label for="mdp">Mot de passe *</label>
            <input type="password" id="mdp" name="mdp" placeholder="Votre Mot de passe" maxlength="15" <?php if (isset($_SESSION['client']['mot_de_passe'])) {
                                                                                                            echo 'value="' . $_SESSION['client']['mot_de_passe'] . '"';
                                                                                                        } ?> />
        </div>
        <div class="input-container">
            <label for="adresse">Adresse *</label>
            <input type="text" id="adresse" name="adresse" placeholder="Votre Adresse" maxlength="140" <?php if (isset($_SESSION['client']['adresse'])) {
                                                                                                            echo 'value="' . $_SESSION['client']['adresse'] . '"';
                                                                                                        } ?> />
        </div>
        <div class="input-container">
            <label for="ville">Ville *</label>
            <input type="text" id="ville" name="ville" placeholder="Votre Ville" maxlength="45" <?php if (isset($_SESSION['client']['ville'])) {
                                                                                                    echo 'value="' . $_SESSION['client']['ville'] . '"';
                                                                                                } ?> />
        </div>
        <div class="input-container">
            <label for="cp">Code Postal *</label>
            <input type="text" id="cp" name="cp" placeholder="Votre Code Postal" maxlength="5" <?php if (isset($_SESSION['client']['cp'])) {
                                                                                                    echo 'value="' . $_SESSION['client']['cp'] . '"';
                                                                                                } ?> />
        </div>
        <p class="champs-obligatoire">* = Champs obligatoire</p>
        <input type="submit"></button>
    </fieldset>
</form>

<p>Vous avez déjà un compte ? <a href="/www/simple_MVC-v2/public/compte/authentification/" style="color:blue">Se connecter</a></p>