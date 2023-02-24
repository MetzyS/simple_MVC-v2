<?php

namespace App\Models;

use App\Core\Model;
use App\Core\DB;
use \PDO;


class M_Compte extends Model
{
    // protected $nom_client = 'nom_client';
    // protected $prenom_client = 'prenom_client';
    // protected $adresse = 'adresse';
    // protected $ville_id = 'ville_id';
    protected $table_ville = 'ville';
    // protected $mail = 'mail';
    // protected $mot_de_passe = 'mot_de_passe';
    // protected $id = 'id_client';

    public function __construct()
    {
        parent::__construct('client');
    }

    /**
     * Récupère l'ID d'un client enregistré
     * via les infos stockés dans $_SESSION['client']
     */
    public function getId($array) {
        $db = DB::getPdo();

        $sql = $db->prepare('SELECT id_client FROM `'.$this->table.'` WHERE mail = :mail');
        $sql->bindParam(':mail', $array['mail']);
        $sql->execute();

        $data = $sql->fetchAll(PDO::FETCH_NAMED);
        $_SESSION['client']['id_client'] = $data['id_client'];
        return $data;
    }
    

    /**
     * Vérifie si l'adresse mail existe déjà
     * @param string adresse mail
     * @return bool
     */
    public function checkMail(string $mail) {
        $db = DB::getPdo();

        $sql = $db->prepare('SELECT mail FROM `'.$this->table.'` WHERE mail = :mail');
        $sql->bindParam(':mail', $mail);
        $sql->execute();

        $data = $sql->fetchAll(PDO::FETCH_ASSOC);

        if(count($data) > 0) {
            $data = false;
        }
        else {
            $data = true;
        }
        return $data;
    }

    /**
     * Vérifie dans la base de données si la ville existe.
     * Si elle n'existe pas, crée la ville dans la base de données.
     * @param int (cp)
     * @param string (nom_ville)
     * @return array $array['id_ville'] = INT
     */
    public function selectOrInsert($cp, $ville) {
        $db = DB::getPdo();
        $sql = $db->prepare('SELECT id_ville FROM ville WHERE ville = :nom_ville');
        $sql->bindParam(':nom_ville', $ville);
        $sql->execute();
        
        $data = $sql->fetch(PDO::FETCH_NAMED);
        // return false si la ville n'existe pas

        if ($data == false) {
            // crée la ville dans la base de données
            $id = " ";
            
            $sql = $db->prepare('INSERT INTO ville VALUES(:id, :cp, :nom_ville)');
            $sql->bindParam(':id', $id);
            $sql->bindParam(':cp', $cp);
            $sql->bindParam(':nom_ville', $ville);
            
            $sql->execute();
            
            
            // récupère l'id de la ville crée
            $stmt = $db->prepare('SELECT id_ville FROM ville WHERE ville = :nom_ville');
            $stmt->bindParam(':nom_ville', $ville);
            $stmt->execute();
            $data = $stmt->fetch();
        }
        return $data;
    }



    /**
     * Créer un client dans la base de données
     * Récupère l'ID de la ville via la fonction selectOrInsert()
     * @param array
     * @param array
     * @return array
     */
    public function create(array $array, array $ville_id) {
        $db = DB::getPdo();
        $id = " ";

        $sql = $db->prepare('INSERT INTO client VALUES(:id, :nom, :prenom, :adresse, :ville_id, :mail, :mot_de_passe)');

        $sql->bindParam(':id', $id);
        $sql->bindParam(':nom', $array['nom']);
        $sql->bindParam(':prenom', $array['prenom']);
        $sql->bindParam(':adresse', $array['adresse']);
        $sql->bindParam(':ville_id', $ville_id['id_ville']);
        $sql->bindParam(':mail', $array['mail']);
        $sql->bindParam(':mot_de_passe', $array['mot_de_passe']);

        $sql->execute();

        $data = $sql->fetch();

        $data['id_client'] = $this->getId($data);
        echo '<pre>';
        var_dump($data);
        die();
        return $data;
    }
}
