<?php

use App\Models\M_HTML;

?>

<h1>Jeux de la catégorie <?=ucfirst($data['categorie_nom'][0]['nom_categorie'])?></h1>
<!-- <h4>Categorie/show.php</h4> -->
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
        echo '<div class="card">';
        M_HTML::cardJeu($value);
        echo '</div>';
    }
    ?>
    </section>
</section>
