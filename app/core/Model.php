<?php


namespace App\Core;

use App\Core\DB;
use \PDO;

include_once 'DB.php';

/**
 * Controller est le modèle sur lequel chaque controleur se basera.
 * Il inclu les méthodes simples de recherche dans la base de donnée (find)
 */
class Model extends DB
{
    /**
     * Permet de charger un modèle et de le return sous forme d'objet
     */
    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    /**
     * Permet de charger la vue que l'on souhaite et lui transmettre des données
     */
    public function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }

    /**
     * simple requete sql
     */
    public function find($id = null)
    {
        if (is_null($id)) {
            $db = DB::getPdo();
            $sql = 'SELECT * FROM jeu';
            $requete = DB::query($sql);
            $data = $requete->fetchAll(PDO::FETCH_NAMED);
            return $data;
        } else {
            $db = DB::getPdo();
            $sql = $db->prepare('SELECT * FROM jeu WHERE id_jeu = :id ');
            $sql->bindParam(':id', $id);
            $sql->execute();
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
    }
    
    public function exemplaire($id = null)
    {
        $db = DB::getPdo();

    }

}
