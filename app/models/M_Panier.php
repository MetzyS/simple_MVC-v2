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

    public function commande($ids, $client)
    {
        $client_id = $client[0]['id_client'];
        $db = DB::getPdo();
        $id_commande = ""; // auto increment
        $id_ligne = "";

        $count = 0; // pour compter le nombre de produits

        $sql = $db->prepare('INSERT INTO commande VALUES (:id_commande, :client_id, NOW(), NOW())');
        $sql->bindParam(':id_commande', $id_commande);
        $sql->bindParam(':client_id', $client_id);

        $sql->execute();
        $last_commande_id = DB::getPdo()->lastInsertId();

        foreach ($ids as $key => $value) {
            $exemplaire_id = $value['id_exemplaire'];

            $sql2 = $db->prepare('INSERT INTO lignes_commande VALUES (:id_ligne, :last_commande_id, :exemplaire_id)');
            $sql2->bindParam(':id_ligne', $id_ligne);
            $sql2->bindParam(':last_commande_id', $last_commande_id);
            $sql2->bindParam(':exemplaire_id', $exemplaire_id);

            $sql2->execute();
            $count = $count + 1;
            $message = "Félicitations, vous avez commandé <strong>" . $count . " produits.</strong>";
        }
        return $message;
    }
}
