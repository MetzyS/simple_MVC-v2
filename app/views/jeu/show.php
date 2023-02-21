<?php

use App\Models\M_HTML;

?>


<h1>Jeu/show.php</h1>

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
</section>

<?php
// var_dump($data);
// foreach ($data['jeu'] as $key => $value) {
    // echo $value['nom_jeu'];
    // cette boucle = nom des jeux
// }
?>