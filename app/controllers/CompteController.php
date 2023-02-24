<?php

use App\Models\M_Compte;

class Compte
{
    protected $model;
    public function __construct()
    {
        $this->model = new M_Compte();
    }

    public function index()
    {
        if (isset($_SESSION['client'])) {
            $client = $_SESSION['client'];
            $message = "";
            $check = $this->model->checkMail($client['mail']);
            if ($check) {
                $ville = $client['ville'];
                $cp = $client['cp'];

                $new_client = $this->model->transaction_create($client, $cp, $ville);

                $message = "Votre inscription a été prise en compte.";
                $this->model->view('compte/informations', [
                    'client' => $client,
                    'message' => $message,
                    'new_client' => $new_client,
                ]);
            } else {
                $message = "Cette adresse mail est déjà utilisée!";
                $this->model->view('compte/informations', [
                    'message' => $message,
                ]);
            }
        } else {
            $message = "???";
            $this->model->view('compte/informations', [
                'message' => $message,
            ]);
        }
    }

    public function inscription()
    {
        $this->model->view('compte/inscription');
    }

    public function authentification()
    {
        $this->model->view('compte/authentification');
    }

    public function checkMail($mail)
    {
        return $this->model->checkMail($mail);
    }
}
