<?php

namespace App\Models;

use App\Core\Model;

class Jeu extends Model
{
    protected $table = 'jeux';
    protected $nom_jeu = 'nom_jeux';
    protected $categorie_id = 'categorie_id';
    protected $id = 'id_jeux';
}
