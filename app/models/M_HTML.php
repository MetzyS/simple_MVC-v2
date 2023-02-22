<?php

namespace App\Models;

class M_HTML
{
    /**
     * Génère les cards jeu en HTML
     */
    public static function cardJeu($jeu)
    {
        $id = $jeu['id_jeu'];
        $nom = $jeu['nom_jeu'];
        $prix = $jeu['prix'];
        $image = $jeu['image'];
        $etat = $jeu['etat'];
        $console = $jeu['nom_console'];

        echo '
        <article>
            <img src="/www/simple_MVC-v2/public/images/jeux/' . $image . '"alt="Image de ' . $nom . '" width="200"/>
            <p> Nom du jeu: <span class="titre_jeu">' . ucwords($nom) . '</span></p>
            <p> Console: ' . strtoUpper($console) . '</p>
            <p> Etat: ' . ucfirst($etat) . '</p>
            <p> Prix: ' . $prix . ' € <a href="/www/simple_MVC-v2/app/views/panier/ajouter.php?id=' . $id . '"><img src="/www/simple_MVC-v2/public/images/mettrepanier.png" title="Ajouter au panier" class="add"></a></p>
            </article>';
    }

    /**
     * Génère les cards des jeux panier
     */
    public static function panierCarteJeu($jeu)
    {
        $id = $jeu['jeu_id'];
        $nom = $jeu['nom_jeu'];
        $prix = $jeu['prix'];
        $image = $jeu['image'];
        $etat = $jeu['etat'];
        $console = $jeu['nom_console'];

        echo '
        <article>
            <img src="/www/simple_MVC-v2/public/images/jeux/' . $image . '"alt="Image de ' . $nom . '" width="200"/>
            <p> Nom du jeu: <span class="titre_jeu">' . ucwords($nom) . '</span></p>
            <p> Console: ' . strtoUpper($console) . '</p>
            <p> Etat: ' . ucfirst($etat) . '</p>
            <p> Prix: ' . $prix . ' € <a href="/www/simple_MVC-v2/app/views/panier/retirer.php?id=' . $id . '"><img src="/www/simple_MVC-v2/public/images/retirerpanier.png" title="Ajouter au panier" class="add"></a></p>
            </article>';
    }

    /**
     * Génère le menu catégorie
     */
    public static function categorieMenu($categorie)
    {
        $nom = $categorie['nom_categorie'];
        $id = $categorie['id_categorie'];

        echo '<li><a href="/www/simple_MVC-v2/public/categorie/show/' . $id . '">' . $nom . '</a></li>';
    }
}
