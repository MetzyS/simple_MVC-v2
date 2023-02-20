<?php

use App\Models\M_User;

class Home extends M_User
{
    /**
     * Affiche views/index.php
     */
    public function index()
    {
        $this->view('home/index', [
            'data' => 'test'
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
