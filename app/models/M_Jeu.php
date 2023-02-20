<?php

namespace App\Models;

use App\Core\Model;
use App\Core\DB;
use \PDO;

// include_once '../app/core/Model.php';

class M_Jeu extends Model
{
    protected $table = 'jeu';
    protected $nom_jeu = 'nom_jeu';
    protected $categorie_id = 'categorie_id';
    protected $id = 'id_jeu';

    public function categorie($id = null)
    {
        if (is_null($id)) {
            $sql = 'SELECT * FROM categorie';
            $requete = DB::query($sql);
            $data = $requete->fetchAll(PDO::FETCH_NAMED);
            return $data;
        } else {
            $sql = 'SELECT * FROM categorie WHERE id_categorie = ' . $id;
            $requete = DB::query($sql);
            $data = $requete->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
    }
}
