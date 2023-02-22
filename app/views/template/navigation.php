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
            <li><a href="#"> Mon compte </a></li>
        </ul>
    </nav>

</header>