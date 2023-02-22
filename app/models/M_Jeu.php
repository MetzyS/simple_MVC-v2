<?php

namespace App\Models;

use App\Core\Model;
use App\Core\DB;
use \PDO;


class M_Jeu extends Model
{
    protected $nom_jeu = 'nom_jeu';
    protected $categorie_id = 'categorie_id';
    protected $id = 'id_jeu';

    public function __construct()
    {
        parent::__construct('jeu');
    }
}
