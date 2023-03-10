<?php

namespace App\Models;

use App\Core\Model;
use App\Core\DB;
use \PDO;


class M_Compte extends Model
{
    protected $table_ville = 'ville';


    public function __construct()
    {
        parent::__construct('client');
    }

    /**
     * Vérifie si l'adresse mail existe déjà
     * @param string adresse mail
     * @return bool
     */
    public function checkMail(string $mail)
    {
        $db = DB::getPdo();

        $sql = $db->prepare('SELECT mail FROM client WHERE mail = :mail');
        $sql->bindParam(':mail', $mail);
        $sql->execute();

        $data = $sql->fetchAll(PDO::FETCH_ASSOC);

        if (count($data) > 0) {
            $data = false;
        } else {
            $data = true;
        }
        return $data;
    }

    /**
     * Vérifie l'exactitude d'un mot de passe
     * @param string mot de passe
     * @return bool
     */
    public function checkPassword(string $pw, string $mail)
    {
        $db = DB::getPdo();
        $sql = $db->prepare('SELECT * FROM client WHERE mail = :mail');
        $sql->bindParam(':mail', $mail);
        $sql->execute();

        $data = $sql->fetchAll(PDO::FETCH_ASSOC | PDO::FETCH_NAMED);

        if (isset($data[0])) {
            $data = password_verify($pw, $data[0]['mot_de_passe']);
        }
        // true si le mot de passe est correct
        if ($data) {
            $data = true;
        } else {
            $data = false;
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
    public function selectOrInsert($cp, $ville)
    {
        $db = DB::getPdo();
        $sql = $db->prepare('SELECT id_ville FROM ville WHERE ville = :nom_ville');
        $sql->bindParam(':nom_ville', $ville);
        $sql->execute();

        $data = $sql->fetch(PDO::FETCH_NAMED);
        // $data = false si la ville n'existe pas

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
    public function create(array $array, array $ville_id)
    {
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

        $data = $sql->fetch(PDO::FETCH_NAMED);

        return $data;
    }

    /**
     * Récupère l'ID d'un client enregistré
     * via les infos stockés dans $_SESSION['client']
     */
    public function getId($array)
    {
        $db = DB::getPdo();

        $sql = $db->prepare('SELECT id_client FROM client WHERE mail = :mail');
        $sql->bindParam(':mail', $array['mail']);
        $sql->execute();

        $data = $sql->fetch(PDO::FETCH_NAMED);
        return $data;
    }

    /**
     * Effectue toutes les étapes de la création client (3 requêtes sql) dans une transaction
     * Si une des requetes plante, un rollback vers l'état initial est fait pour éviter toute corruption de la base de données
     * @param array $client de $_SESSION['client']
     * @param string $cp (code postal)
     * @param string $ville de $_SESSION['client']['ville']
     * @return array ligne du client dans la table client.
     */
    public function transaction_create($array, $cp, $ville)
    {
        $db = DB::getPdo();
        $db->beginTransaction();
        try {
            $ville_id = $this->selectOrInsert($cp, $ville);
            $client = $this->create($array, $ville_id);
            $id = $this->getId($array);

            // Commit les 3 requêtes
            $db->commit();
        } catch (\Exception $e) {
            $db->rollback();
        }
        $data = [$client, $id];
        return $data;
    }

    public function getClient($mail)
    {
        $db = DB::getPdo();
        $sql = $db->prepare('SELECT * FROM client JOIN ville ON client.ville_id = ville.id_ville WHERE mail = :mail');
        $sql->bindParam(':mail', $mail);
        $sql->execute();

        $data = $sql->fetchAll(PDO::FETCH_NAMED);

        return $data;
    }

    public function getCommandes($id)
    {
        $db = DB::getPdo();
        $sql = $db->prepare('SELECT id_commande, nom_jeu, prix, created_at FROM commande JOIN lignes_commande ON id_commande = commande_id JOIN exemplaire ON exemplaire_id = id_exemplaire JOIN jeu ON id_jeu = exemplaire.jeu_id WHERE commande.client_id = :id_client ORDER BY id_commande DESC');
        $sql->bindParam(':id_client', $id);
        $sql->execute();

        $data = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    /**
     * Fonction qui permet de modifier les informations du client dans la base de données
     */
    public function setModification($array, $ville_id, $id)
    {
        $db = DB::getPdo();
        $sql = $db->prepare('UPDATE client SET nom_client = :nom, prenom_client = :prenom, adresse = :adresse, ville_id = :ville_id, mail = :mail WHERE id_client = :id');
        $sql->bindParam(':nom', $array['nom']);
        $sql->bindParam(':prenom', $array['prenom']);
        $sql->bindParam(':adresse', $array['adresse']);
        $sql->bindParam(':ville_id', $ville_id);
        $sql->bindParam(':mail', $array['mail']);
        $sql->bindParam(':id', $id);

        $sql->execute();

        $data = $sql->fetchAll(PDO::FETCH_NAMED);

        return $data;
    }
}
