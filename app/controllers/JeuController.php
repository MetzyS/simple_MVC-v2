<?php

use App\Models\M_Jeu;

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
        $exemplaire = $this->exemplaire(null);

        $this->view('jeu/show', [
            'jeu' => $jeu,
            'categorie_menu' => $categorie_menu,
            'exemplaire' => $exemplaire,
        ]);
    }
}
