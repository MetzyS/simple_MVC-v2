<?php

use App\Models\M_HTML;

?>


<h1>Liste de tous les jeux</h1>
<!-- <h4>Jeu/show.php</h4> -->

<?php
if (!empty($data['dernier_nom_jeu'])) {
    echo '<p>' . $data['dernier_nom_jeu'][0]['nom_jeu'] . ' a bien été ajouté au panier</p>';
    unset($data['dernier_nom_jeu']);
}
?>

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