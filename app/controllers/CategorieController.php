<?php

use App\Models\M_Categorie;

class Categorie
{
    protected $model;
    public function __construct()
    {
        $this->model = new M_Categorie();
    }
    /**
     * Affiche views/categorie/index.php
     */
    public function index()
    {
        $this->model->view('categorie/index', [
            'page' => 'categorie',
        ]);
    }

    /**
     * Affiche views/categorie/show.php avec les infos de la table categorie & jeux
     */
    public function show($id = null)
    {
        $categorie = $this->model->categorie($id);
        $categorie_menu = $this->model->categorie(null);
        $exemplaire = $this->model->exemplaire($id);
        if(is_null($id)) {
            // $jeu =  $this->model->find($id);
            // $categorie_menu = $this->model->categorie(null);
            // $exemplaire = $this->model->exemplaire(null);
    
            // $this->model->view('jeu/show', [
            //     'jeu' => $jeu,
            //     'categorie_menu' => $categorie_menu,
            //     'exemplaire' => $exemplaire,
            // ]);
        }
        $categorie_nom = $this->model->getNomCategorie($id);

        $this->model->view('categorie/show', [
            'categorie' => $categorie,
            'categorie_menu' => $categorie_menu,
            'exemplaire' => $exemplaire,
            'categorie_nom' => $categorie_nom,
        ]);
    }

    public function test()
    {
        $data = $this->model->find();
        var_dump($data);
        die();
    }
}
