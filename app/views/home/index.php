<?php
if (isset($_SESSION['utilisateur'][0]['id_client'])) {
    echo '<p>' . $_SESSION['utilisateur'][0]['prenom_client'] . ', bienvenue chez';
}
?>
<h1>Lord Of Geek</h1>
<h2>le prince des jeux sur internet</h2>