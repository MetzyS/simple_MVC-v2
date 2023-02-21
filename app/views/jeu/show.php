<?php

use App\Models\M_HTML;

?>


<h1>Liste de tous les jeux</h1>
<!-- <h4>Jeu/show.php</h4> -->

<p></p>

<section id="visite">
<aside>
<ul>
    <?php
    foreach ($data['categorie_menu'] as $key => $categorie) {
        M_HTML::categorieMenu($categorie);
        // cette boucle utilise la methode categorieMenu du modèle M_HTML
    };
    ?>
</ul>
</aside>
<section id="jeu">
<?php
    foreach ($data['exemplaire'] as $key => $value) {
        M_HTML::cardJeu($value);
    }
    ?>
    </section>
    </section>