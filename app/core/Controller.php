<?php

include 'DB.php';

/**
 * Controller est le modèle sur lequel chaque controleur se basera.
 * Il inclu les méthodes simples de recherche dans la base de donnée (find)
 */
class Controller
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
        require_once '../app./views/' . $view . '.php';
        // require_once '../app/views/template/template.php';
        // require_once '../public/index.php';
    }

    public function find($id = null)
    {
        if (is_null($id)) {
            $sql = 'SELECT * FROM jeux';
            $requete = DB::query($sql);
            // var_dump($requete);
            // die();
            $data = $requete->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } else {
            $sql = 'SELECT * FROM jeux WHERE id_jeux = ' . $id;
            $requete = DB::query($sql);
            // var_dump($requete);
            // die();
            $data = $requete->fetchAll();
            return $data;
        }
    }
}
