<?php

use App\Models\M_Panier;

class Panier extends M_Panier
{
    /**
     * Affiche views/jeux/index.php
     */
    public function show()
    {
        //faire une requete qui nous donne tous le jeux du panier

        // $ids = implode(",",$_SESSION["panier"]);
        $ids = $_SESSION['panier'];
        // var_dump($ids);
        // die();
        $panier = $this->exemplairePanier($ids);
        $this->view('panier/show', [
            'panier' => $panier,
        ]);
    }
}
