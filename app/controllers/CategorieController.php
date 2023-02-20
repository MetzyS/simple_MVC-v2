<?php

// namespace App\Controllers;

use App\Models\M_Categorie;

// include_once $_SERVER['DOCUMENT_ROOT'] . '/models/M_Jeu.php';
// include './app/models/M_Jeu.php';


class Categorie extends M_Categorie
{
    /**
     * Affiche views/jeux/index.php
     */
    public function index()
    {
        // $user = $this->model('User');
        // $user->name = $name;

        $this->view('categorie/index', [
            'page' => 'categorie',
        ]);
    }

    /**
     * Affiche views/categorie/show.php avec les infos de la table jeux & categorie
     */
    public function show($id = null)
    {
        $categorie = $this->categorie($id);

        $this->view('categorie/show', [
            'categorie' => $categorie,
        ]);
    }
}
