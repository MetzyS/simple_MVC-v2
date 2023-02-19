<?php

namespace App\Controllers;

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
        // $user = $this->model('User');
        // $user->name = $name;

        $this->view('jeu/index', [
            'page' => 'jeu',
        ]);
    }

    /**
     * Affiche views/jeux/index.php avec les infos de la table jeux
     */
    public function show($id = null)
    {
        $jeu =  $this->find($id);

        $this->view('jeu/show', [
            'data' => $jeu,
        ]);
    }
}
