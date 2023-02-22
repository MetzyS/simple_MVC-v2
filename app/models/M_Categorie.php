<?php

namespace App\Models;

use App\Core\Model;
use App\Core\DB;
use \PDO;


class M_Categorie extends Model
{
    protected $nom_categorie = 'nom_categorie';
    protected $id = 'id_categorie';
    protected $table_exemplaire = 'exemplaire';

    public function __construct()
    {
        parent::__construct('categorie');
    }

    /**
     * Return les infos de la table categorie (bdd)
     * Si un $id est précisé, WHERE categorie_id = $id
     * Sinon, on récupère toutes les infos.
     */

    public function getNomCategorie($id = null)
    {
        if (is_null($id)) {
            $sql = 'SELECT nom_categorie FROM ' . $this->table;
            $requete = DB::query($sql);
            $data = $requete->fetchAll(PDO::FETCH_NAMED);
        } else {
            $db = DB::getPdo();
            $sql = $db->prepare('SELECT nom_categorie FROM categorie WHERE id_categorie = :id');
            $sql->bindParam(':id', $id);
            $sql->execute();
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }
}
