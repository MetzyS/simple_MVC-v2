<?php

namespace App\Models;

use App\Core\Model;
use App\Core\DB;
use \PDO;


class M_Panier extends Model
{
    public function __construct()
    {
        parent::__construct('panier');
    }
    /**
     * Return les informations concernant les jeux identifiés par $ids
     * $ids est un tableau d'ids stockés dans $_SESSION['panier']
     */
    public function exemplairePanier($ids)
    {
        if (count($ids) == 0) {
            $data = "Votre panier est vide";
        } else {
            $db = DB::getPdo();

            $array = [];

            $sql = 'SELECT id_exemplaire, nom_jeu, nom_console, jeu_id, prix, image, etat FROM `exemplaire` JOIN jeu ON exemplaire.jeu_id = jeu.id_jeu JOIN console ON exemplaire.console_id = console.id_console WHERE id_exemplaire IN(';
            foreach ($ids as $key => $id) {
                $array['j' . $key] = $id;
                $sql .= ':j' . $key . ',';
            }

            $sql = rtrim($sql, ',');
            $sql .= ')';

            $stm = $db->prepare($sql);

            $stm->execute($array);

            $data = $stm->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }
    // Nous effectuons plusieurs traitements sur $sql car pour la requête SQL WHERE ... IN ..., nous devons injecter des valeurs entourés de quotes et séparés par une ",". 
}
