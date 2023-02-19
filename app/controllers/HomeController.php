<?php

namespace App\Controllers;

use App\Core\Model;

class Home extends Model
{
    /**
     * Affiche views/index.php
     */
    public function index()
    {
        $this->view('home/index', [
            'data' => 'wesh'
        ]);
    }

    /**
     * Affiche views/home/show.php avec les infos de la table jeux
     */
    public function show($id = null)
    {
        $jeu =  $this->find($id);

        $this->view('home/show', [
            'data' => $jeu,
        ]);
    }
}
