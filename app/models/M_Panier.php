<?php

namespace App\Models;

use App\Core\Model;
use App\Core\DB;
use \PDO;


class M_Panier extends Model
{
    /**
     * Return les informations concernant les jeux identifiés par $ids
     * $ids est un tableau d'ids stockés dans $_SESSION['panier']
     */
    public function exemplairePanier($ids)
    {
        if(count($ids)==0) {
            $data = 'Votre panier est vide';
            return $data;
    }
    // Cette fonction semble complexe car pour la requête SQL WHERE ... IN ..., nous devons injecter des valeurs entourés de quotes et séparés par une ",".
    // D'ou les différents traîtements effectués aux lignes 21, 23 et 28.
    else {
        $db = DB::getPdo();
        // Transforme l'array $ids en string et remplace les ids par des "?"
        // Ceci nous servira a préparer la reqûete.
        $bindClause = implode(',', array_fill(0, count($ids), '?'));
        // Crée une variable avec le string "s" dupliqué autant de fois qu'il y a d'ids
        $bindString = str_repeat("s", count($ids));

        $sql = $db->prepare('SELECT id_exemplaire, nom_jeu, nom_console, jeu_id, prix, image, etat FROM `exemplaire` JOIN jeu ON exemplaire.jeu_id = jeu.id_jeu JOIN console ON exemplaire.console_id = console.id_console WHERE id_exemplaire IN('.$bindClause.')');

        // Remplace $bindClause (donc les "?") par bindString dans lequel nous injectons les ids
        $sql->bindParam($bindString, ...$ids);

        $sql->execute($ids);
        $data = $sql->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

}

}