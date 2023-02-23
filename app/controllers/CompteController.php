<?php

use App\Models\M_Compte;

class Compte
{
    protected $model;
    public function __construct()
    {
        $this->model = new M_Compte();
    }

    public function index() {
        // $salut = 'hey';
        $this->model->view('compte/informations',[
            // 'salut' => $salut
        ]);
    }

    public function inscription(){
        $this->model->view('compte/inscription');
    }

    public function authentification(){
        $this->model->view('compte/authentification');
    }
}