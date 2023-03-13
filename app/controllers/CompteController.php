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
        $id = $_SESSION['utilisateur'][0]['id_client'];
        $commandes = $this->model->getCommandes($id);
        $this->model->view('compte/informations', [
            'commandes' => $commandes,
        ]);
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
                // Hashage mot de passe avant inscription dans la base de donnée
                $client['mot_de_passe'] = password_hash($client['mot_de_passe'], PASSWORD_BCRYPT);
                // Creation du client dans la base de donnée
                $new_client = $this->model->transaction_create($client, $cp, $ville);
                $client = $this->model->getClient($client['mail']);

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
        } else {
            header('Location: /www/simple_MVC-v2/app/views/template/404.php');
        }
    }

    public function connect()
    {
        if (isset($_SESSION['client'])) {
            $client = $_SESSION['client'];
            $erreur = "";
            $mail_checkregex = Verification::mailRegex($client['mail']);
            $check = $this->model->checkMail($client['mail']);
            $pw_match = $this->model->checkPassword($client['mot_de_passe'], $client['mail']);


            // Vérifie que le mail est du bon format et qu'il existe dans la bdd
            // Vérifie que le mot de passe (hashé) correspond au mot de passe associé a l'adresse mail
            if ($mail_checkregex && !$check && $pw_match) {
                $message = "Connexion réussie";
                $client = $this->model->getClient($client['mail']);
                $commandes = $this->model->getCommandes($client[0]['id_client']);
                $this->model->view('compte/informations', [
                    'message' => $message,
                    'client' => $client,
                    'commandes' => $commandes
                ]);
            } else {
                if (!$mail_checkregex) {
                    $erreur .= "<strong>Adresse mail invalide</strong>. L'adresse mail doit contenir <strong>'@' et un nom de domaine valide (ex: '.com', '.fr', '.net' etc.)</strong><br>";
                    $this->model->view('compte/authentification', [
                        'erreur' => $erreur,
                    ]);
                }
                if ($check) {
                    $erreur .= "Aucun compte associé a cette adresse mail.<br>";
                    $this->model->view('compte/authentification', [
                        'erreur' => $erreur,
                    ]);
                }
                if (!$pw_match) {
                    $erreur .= "Mot de passe incorrect.";
                }
                $this->model->view('compte/authentification', [
                    'erreur' => $erreur,
                ]);
            }
        } else {
            header('Location: /www/simple_MVC-v2/app/views/template/404.php');
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

    public function modification()
    {
        if (isset($_SESSION['utilisateur'])) {
            if (isset($_SESSION['modif'])) {
                $id = $_SESSION['utilisateur'][0]['id_client'];
                $modif = $_SESSION['modif'];

                $ville_id = $this->model->selectOrInsert($modif['cp'], $modif['ville']);

                $this->model->setModification($modif, $ville_id['id_ville'], $id);
                $confirmation = 'Vos modifications ont bien été prises en compte.';

                $client = $this->model->getClient($modif['mail']);
                $new = "new";

                $this->model->view('compte/informations', [
                    'confirmation' => $confirmation,
                    'client' => $client,
                    'new' => $new,
                ]);
            } else {
                $id = $_SESSION['utilisateur'][0]['id_client'];
                $commandes = $this->model->getCommandes($id);
                $erreur = 'Un problème est survenu, veuillez ré-essayer';
                $this->model->view('compte/informations', [
                    'erreur' => $erreur,
                    'commandes' => $commandes,
                ]);
            }
        } else {
            header('Location: /www/simple_MVC-v2/app/views/template/404.php');
        }
    }
}
