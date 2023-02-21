<?php

// namespace App\Controllers;

use App\Models\M_Panier;

// include_once $_SERVER['DOCUMENT_ROOT'] . '/models/M_Jeu.php';
// include './app/models/M_Jeu.php';


class Panier extends M_Panier
{
    /**
     * Affiche views/jeux/index.php
     */
    public function index()
    {
        $this->view('panier/index', [
            'page' => 'jeu',
        ]);
    }
}
