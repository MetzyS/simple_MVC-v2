<?php

use App\Models\M_Jeu;

class Jeu
{
    protected $model;
    public function __construct()
    {
        $this->model = new M_Jeu();
    }
    /**
     * Affiche views/jeux/index.php
     */
    public function index()
    {
        $this->model->view('jeu/index', [
            'page' => 'jeu',
        ]);
    }

    /**
     * Affiche views/jeux/show.php avec les infos de la table jeux & categorie
     */
    public function show($id = null)
    {
        $jeu =  $this->model->find($id);
        $categorie_menu = $this->model->categorie(null);
        $exemplaire = $this->model->exemplaire(null);
        $dernier_id_jeu = end($_SESSION['panier']);
        $dernier_nom_jeu = $this->model->find($dernier_id_jeu);


        $this->model->view('jeu/show', [
            'jeu' => $jeu,
            'categorie_menu' => $categorie_menu,
            'exemplaire' => $exemplaire,
            'dernier_nom_jeu' => $dernier_nom_jeu
        ]);
    }
}
