<?php

use App\Models\M_HTML;

?>
<!-- <link rel="stylesheet" href="\www\simple_MVC-v2\public\css\style.css"> -->

<h1>Categorie/show.php</h1>
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
    // var_dump($data['exemplaire']);
    foreach ($data['exemplaire'] as $key => $value) {
        echo '<div class="card">';
        M_HTML::cardJeu($value);
        echo '</div>';
    }
    ?>
    </section>
</section>
