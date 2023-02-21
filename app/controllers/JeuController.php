<?php

// namespace App\Controllers;

use App\Models\M_Jeu;

// include_once $_SERVER['DOCUMENT_ROOT'] . '/models/M_Jeu.php';
// include './app/models/M_Jeu.php';


class Jeu extends M_Jeu
{
    /**
     * Affiche views/jeux/index.php
     */
    public function index()
    {
        $this->view('jeu/index', [
            'page' => 'jeu',
        ]);
    }

    /**
     * Affiche views/jeux/show.php avec les infos de la table jeux & categorie
     */
    public function show($id = null)
    {
        $jeu =  $this->find($id);
        $categorie_menu = $this->categorie(null);

        $this->view('jeu/show', [
            'jeu' => $jeu,
            'categorie_menu' => $categorie_menu,
        ]);
    }
}
