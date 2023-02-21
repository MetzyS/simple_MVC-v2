<?php

namespace App\Models;

use App\Core\Model;
use App\Core\DB;
use \PDO;


class M_Categorie extends Model
{
    protected $table = 'categorie';
    protected $nom_categorie = 'nom_categorie';
    protected $id = 'id_categorie';
    protected $table_exemplaire = 'exemplaire';

    /**
     * Return les infos de la table categorie (bdd)
     * Si un $id est précisé, WHERE categorie_id = $id
     * Sinon, on récupère toutes les infos.
     */
    public function categorie($id = null)
    {
        if (is_null($id)) {
            $sql = 'SELECT * FROM '. $this->table;
            $requete = DB::query($sql);
            $data = $requete->fetchAll(PDO::FETCH_NAMED);
            return $data;
        } 
        else
         {
            $db = DB::getPdo();
            $sql = $db->prepare('SELECT * FROM jeu WHERE categorie_id = :id');
            $sql->bindParam(':id', $id);
            $sql->execute();
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
    }

    public function getNomCategorie($id = null)
    {
        if (is_null($id)) {
            $sql = 'SELECT nom_categorie FROM '. $this->table;
            $requete = DB::query($sql);
            $data = $requete->fetchAll(PDO::FETCH_NAMED);
            return $data;
        }
        else
         {
            $db = DB::getPdo();
            $sql = $db->prepare('SELECT nom_categorie FROM categorie WHERE id_categorie = :id');
            $sql->bindParam(':id', $id);
            $sql->execute();
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
    }
}
