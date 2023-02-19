<?php

class Jeu extends Controller
{
    /**
     * Affiche views/jeux/index.php
     */
    public function index()
    {
        // $user = $this->model('User');
        // $user->name = $name;

        $this->view('jeu/index', [
            // 'page' => 'jeu',
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
