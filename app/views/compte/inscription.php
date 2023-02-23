<h1>compte/inscription</h1>

<form action="/www/simple_MVC-v2/app/views/compte/ajouter.php" method="post">
    <fieldset>
        <legend>Inscription</legend>
            <div class="input-container">
                <label for="nom">Nom </label>
                <input type="text" id="nom" name="nom" placeholder="Votre Nom" maxlength="20"/>
            </div>
            <div class="input-container">    
                <label for="prenom">Prenom </label>
                <input type="text" id="prenom" name="prenom" placeholder="Votre Prenom" maxlength="20"/>
            </div>
            <div class="input-container">    
                <label for="mail">Mail </label>
                <input type="email" id="mail" name="mail" placeholder="Votre Mail" maxlength="20"/>
            </div>
            <div class="input-container">    
                <label for="mdp">Mot de passe </label>
        <input type="text" id="mdp" name="mdp" placeholder="Votre Mot de passe" maxlength="20"/>
            </div>
            <div class="input-container">    
                <label for="adresse">Adresse </label>
        <input type="text" id="adresse" name="adresse" placeholder="Votre Adresse" maxlength="20"/>
            </div>
            <div class="input-container">    
                <label for="ville">Ville </label>
        <input type="text" id="ville" name="ville" placeholder="Votre Ville" maxlength="20"/>
            </div>
            <div class="input-container">    
                <label for="cp">Code Postal </label>
        <input type="text" id="cp" name="cp" placeholder="Votre Code Postal" maxlength="20"/>
            </div>
<input type="submit"></button>
    </fieldset>
</form>

<p>Vous avez déjà un compte ? <a href="/www/simple_MVC-v2/public/compte/authentification/" style="color:blue">Se connecter</a></p>
