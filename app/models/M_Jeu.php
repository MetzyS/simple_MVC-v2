<?php

namespace App\Models;

use App\Core\Model;

// include_once '../app/core/Model.php';

class M_Jeu extends Model
{
    protected $table = 'jeu';
    protected $nom_jeu = 'nom_jeu';
    protected $categorie_id = 'categorie_id';
    protected $id = 'id_jeu';
}
