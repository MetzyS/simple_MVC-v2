<?php

use App\Models\M_Compte;
use App\Validators\Verification;

class Compte
{
    protected $model;
    public function __construct()
    {
        $this->model = new M_Compte();
    }

    public function index()
    {
        $this->model->view('compte/informations');
    }

    public function create()
    {
        if (isset($_SESSION['client'])) {
            $client = $_SESSION['client'];
            $message = "";
            $mail_checkregex = Verification::mailRegex($client['mail']);
            $pw_checkregex = Verification::pwRegex($client['mot_de_passe']);
            $cp_checkregex = Verification::cpRegex($client['cp']);
            $check = $this->model->checkMail($client['mail']);
            if ($mail_checkregex && $pw_checkregex && $cp_checkregex && $check) {

                $ville = $client['ville'];
                $cp = $client['cp'];
                $client['mot_de_passe'] = password_hash($client['mot_de_passe'], PASSWORD_BCRYPT);
                $new_client = $this->model->transaction_create($client, $cp, $ville);

                $message = "Votre inscription a été prise en compte.";
                $this->model->view('compte/informations', [
                    'client' => $client,
                    'message' => $message,
                    'new_client' => $new_client,
                ]);
            } else {
                if (!$check) {
                    $message .= "Adresse mail déjà utilisée <br>";
                }
                if (!$mail_checkregex) {
                    $message .= "<strong>Adresse mail invalide</strong>. L'adresse mail doit contenir <strong>'@' et un nom de domaine valide (ex: '.com', '.fr', '.net' etc.)</strong><br>";
                }
                if (!$pw_checkregex) {
                    $message .= "<strong>Mot de passe invalide</strong>. Le mot de passe doit contenir entre <strong>8 et 15 caractères dont minimum 1 majuscule, 1 minuscule, 1 chiffre et 1 caractère spécial ($ @ ! % * ? &)</strong><br>";
                }
                if (!$cp_checkregex) {
                    $message .= "<strong>Code postal invalide</strong>. Le code postal doit être un nombre entier et contenir <strong>5 chiffres</strong><br>";
                }
                $this->model->view('compte/inscription', [
                    'message' => $message,
                ]);
            }
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
