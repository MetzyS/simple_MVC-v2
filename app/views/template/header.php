        <?php
        $test = str_replace('.php', '', $_SERVER['PHP_SELF']);
        ?>
        <header>
            <!-- Images En-tête -->
            <img src="public/images/logo.png" alt="Logo Lord Of Geek" />
            <!--  Menu haut-->
            <nav id="menu">
                <ul>
                    <!-- <li><a href=<= $test . "/home/index" >> Accueil </a></li> -->
                    <li><a href="www/simple_MVC-v2/public/home/index"> Accueil </a></li>
                    <li><a href="www/simple_MVC-v2/public/jeu/index"> Voir le catalogue de jeux </a></li>
                    <li><a href="?page=panier"> Voir son panier </a></li>
                    <li><a href="?page=compte"> Mon compte </a></li>
                </ul>
            </nav>

        </header>