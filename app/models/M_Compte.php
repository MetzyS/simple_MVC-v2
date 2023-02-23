<?php

namespace App\Models;

use App\Core\Model;
use App\Core\DB;
use \PDO;


class M_Compte extends Model
{
    protected $nom_client = 'nom_client';
    protected $prenom_client = 'prenom_client';
    protected $adresse = 'adresse';
    protected $ville_id = 'ville_id';
    protected $mail = 'mail';
    protected $mot_de_passe = 'mot_de_passe';
    protected $id = 'id_client';

    public function __construct()
    {
        parent::__construct('client');
    }
}
