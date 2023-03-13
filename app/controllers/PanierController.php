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
     * avec les informations de tout les exemplaires de jeu disponibles dans la BDD
     */
    public function show()
    {
        //faire une requete qui nous donne tous le jeux du panier
        $ids = $_SESSION['panier'];
        $panier = $this->model->exemplairePanier($ids);
        $this->model->view('panier/show', [
            'panier' => $panier,
        ]);
    }

    /**
     * 
     */
    public function commande()
    {
        if ($_SESSION['utilisateur'] !== null || !empty($_SESSION['utilisateur'])) {
            if (!isset($_SESSION['commande'])) {
                $this->show();
            } else {
                $ids = $_SESSION['commande'];
                $client = $_SESSION['utilisateur'];
                $message = $this->model->commande($ids, $client);
                unset($_SESSION['commande']);
                unset($_SESSION['panier']);
                $this->model->view('panier/confirmation', [
                    'message' => $message,
                ]);
            }
        } else {
            $erreur = "Vous devez d'abord vous connecter";
            $this->model->view('compte/authentification', [
                'erreur' => $erreur,
            ]);
        }
    }
}
