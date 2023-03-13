<?php

use App\Models\M_Categorie;

class Categorie
{
    protected $model;
    public function __construct()
    {
        $this->model = new M_Categorie();
    }
    /**
     * Affiche views/categorie/index.php
     */
    public function index()
    {
        $this->model->view('categorie/index', [
            'page' => 'categorie',
        ]);
    }

    /**
     * Affiche views/categorie/show.php avec les infos de la table categorie & jeux
     */
    public function show($id = null)
    {
        $categorie = $this->model->categorie($id);
        $categorie_menu = $this->model->categorie(null);
        $exemplaire = $this->model->exemplaire($id);
        $categorie_nom = $this->model->getNomCategorie($id);

        // vérifie l'existence de la catégorie dans la base de donnée (numéro écrit dans l'URL)
        // si un résultat est trouvé => ok
        // sinon redirection vers 
        if (!empty($categorie)) {
            $this->model->view('categorie/show', [
                'categorie' => $categorie,
                'categorie_menu' => $categorie_menu,
                'exemplaire' => $exemplaire,
                'categorie_nom' => $categorie_nom,
            ]);
        } else {
            header('Location: /www/simple_MVC-v2/app/views/template/404.php');
        }
    }
}
