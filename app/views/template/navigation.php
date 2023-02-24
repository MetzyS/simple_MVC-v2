<?php
$lienInscription = '/www/simple_MVC-v2/public/compte/inscription/';
$lienInformations = '/www/simple_MVC-v2/public/compte/informations/';
$lienAuthentification = '/www/simple_MVC-v2/public/compte/authentification/';
$lienDeconnexion = '/www/simple_MVC-v2/app/views/compte/deconnexion.php';
?>
<header>
    <!-- Images En-tête -->
    <img src="/www/simple_MVC-v2/public/images/logo.png" alt="Logo Lord Of Geek" />
    <!--  Menu haut-->
    <nav id="menu">
        <ul>
            <li><a href="/www/simple_MVC-v2/public/home/index/"> Accueil </a></li>
            <li><a href="/www/simple_MVC-v2/public/jeu/show/"> Voir le catalogue de jeux </a></li>
            <li><a href="/www/simple_MVC-v2/public/panier/show/"> Voir son panier
                    <?php
                    if (!isset($_SESSION['panier'])) {
                        echo '<span class="alert">(0)</span>';
                    } else if (!is_null($_SESSION['panier'])) {
                        $nombre_element = count($_SESSION['panier']);
                        echo '<span class="alert">(' . $nombre_element . ')</span>';
                    }
                    ?>
                </a></li>
            <li><a href=<?php if (!isset($_SESSION['utilisateur']) || is_null($_SESSION['utilisateur'])) {
                            echo '"' . $lienAuthentification . '"> Mon compte </a></li>';
                        } else {
                            echo '"' . $lienInformations . '"> Mon compte </a></li>';
                            echo '<li><a href="' . $lienDeconnexion . '"> Se deconnecter</a></li>';
                        }
                        ?> </ul>
    </nav>

</header>