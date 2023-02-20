<?php

namespace App\Models;

use App\Core\Model;
use App\Core\DB;
use \PDO;

// include_once '../app/core/Model.php';

class M_Categorie extends Model
{
    protected $table = 'categorie';
    protected $nom_categorie = 'nom_categorie';
    protected $id = 'id_categorie';

    public function categorie($id = null)
    {
        if (is_null($id)) {
            $sql = 'SELECT * FROM categorie';
            $requete = DB::query($sql);
            $data = $requete->fetchAll(PDO::FETCH_NAMED);
            return $data;
        } else {
            $sql = 'SELECT * FROM jeu WHERE categorie_id = ' . $id;
            $requete = DB::query($sql);
            $data = $requete->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
    }
}
