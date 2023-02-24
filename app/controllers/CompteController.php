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
        $client = $_SESSION['client'];
        $message = "";
        // var_dump($client);
        $check = $this->model->checkMail($client['mail']);
        if ($check) {
            $ville = $client['ville'];
            $cp = $client['cp'];
            $ville_id = $this->model->selectOrInsert($cp,$ville); // faire une transaction sql: si la ville est crée mais que le client plante on doit rollback
            // insert or select: il select avec where nom_ville=ville et il stocke qqpart, ensuite if stocke = vide => insert puis return l'id --- else return l'id.
            $this->model->create($client,$ville_id);
            $message = "Votre inscription a été prise en compte.";
            $this->model->view('compte/informations', [
                'client' => $client,
                'message' => $message,
            ]);
        } else {
            $message = "Cette adresse mail est déjà utilisée!";
            $this->model->view('compte/informations',[
                'message' => $message,
            ]);
        }
            
    }

    public function inscription(){
        $this->model->view('compte/inscription');
    }

    public function authentification(){
        $this->model->view('compte/authentification');
    }

    public function checkMail($mail) {
        return $this->model->checkMail($mail);
    }
}