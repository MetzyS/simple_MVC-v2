<?php

class Home extends Controller
{
    /**
     * Affiche views/index.php
     */
    public function index()
    {
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
