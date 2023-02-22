<?php

use App\Models\M_User;

class Home
{
    protected $model;
    public function __construct()
    {
        $this->model = new M_User();
    }
    /**
     * Affiche views/index.php
     */
    public function index()
    {
        $this->model->view('home/index', [
            'data' => 'test'
        ]);
    }

    /**
     * Affiche views/home/show.php avec les infos de la table jeux
     */
    public function show($id = null)
    {
        $jeu =  $this->model->find($id);

        $this->model->view('home/show', [
            'data' => $jeu,
        ]);
    }
}
