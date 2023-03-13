<?php
if (isset($_SESSION['utilisateur']['id_client'])) {
    header('Location: /www/simple_MVC-v2/public/compte/informations/');
}

?>
<h1>compte/authentification</h1>

<?php
if (isset($data['erreur'])) {
    echo '<p class="erreur">' . $data['erreur'] . '</p>';
}
?>

<form action="/www/simple_MVC-v2/app/views/compte/connexion.php" method="POST">
    <fieldset>
        <legend>Connexion</legend>

        <div class="input-container">
            <label for="mail">Mail </label>
            <input type="email" name="mail" placeholder="Votre Mail" maxlength="20" required />
        </div>
        <div class="input-container">
            <label for="mdp">Mot de passe </label>
            <input type="password" name="mdp" placeholder="Votre Mot de passe" maxlength="20" required />
        </div>
        <button type="submit">Envoyer</button>
    </fieldset>
</form>
<br>

<p>Pas de compte ? <a href="/www/simple_MVC-v2/public/compte/inscription/" style="color:blue">S'inscrire</a></p>