<?php

use App\Models\M_Panier;

class Panier
{
    protected $model;
    public function __construct()
    {
        $this->model = new M_Panier();
    }
    /**
     * Affiche views/jeux/index.php
     */
    public function show()
    {
        //faire une requete qui nous donne tous le jeux du panier

        // $ids = implode(",",$_SESSION["panier"]);
        $ids = $_SESSION['panier'];
        // var_dump($_SESSION['panier']);
        $panier = $this->model->exemplairePanier($ids);
        $this->model->view('panier/show', [
            'panier' => $panier,
        ]);
    }
}
