<?php

use App\Models\M_Categorie;


class Categorie extends M_Categorie
{
    /**
     * Affiche views/categorie/index.php
     */
    public function index()
    {
        $this->view('categorie/index', [
            'page' => 'categorie',
        ]);
    }

    /**
     * Affiche views/categorie/show.php avec les infos de la table categorie & jeux
     */
    public function show($id = null)
    {
        $categorie = $this->categorie($id);
        $categorie_menu = $this->categorie(null);
        $exemplaire = $this->exemplaire($id);

        $this->view('categorie/show', [
            'categorie' => $categorie,
            'categorie_menu' => $categorie_menu,
            'exemplaire' => $exemplaire,
        ]);
    }

}
