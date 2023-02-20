<?php

namespace App\Core;

class App
{
    // Lors de l'initialisation de l'application, on utilisera Home et Index par défault.
    protected $controller = 'home';
    protected $method = 'index';

    // $params stockera les parametres présent dans l'URL 
    // exemple: home/index/param1/param2..
    protected $params = [];

    public function __construct()
    {
        // Système de routage
        // $url stocke les élements séparés de l'URL (via la fonction parseUrl)
        $url = $this->parseUrl();


        if (is_null($url)) {
            $url[0] = 'home';
        }

        // vérifie sur le controleur existe en prenant l'élement contenu dans $url[0]
        // si le controleur existe, change la valeur de $controller
        if (file_exists('../app/controllers/' . $url[0] . 'Controller.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        // include('../app/views/template/navigation.php');
        require('../app/controllers/' . $this->controller . 'Controller.php');


        // crée une instance du controleur
        // var_dump($this->controller);
        // die();
        $this->controller = new $this->controller;

        // vérifie si la methode (du controleur) existe en prenant l'élemennt contenu dans $url[1]
        // si la méthode existe, change la valeur de $method
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        // Permet de réorganiser les indexes de $url[] (a cause des unsets précedents)
        // vérifie si $url existe -> ré-organise les index, sinon -> params = objet vide
        $this->params = $url ? array_values($url) : [];

        // Deux arguments: un tableau qui contient un controleur ainsi qu'une methode, les paramètres que l'on veut envoyer
        call_user_func_array([$this->controller, $this->method], $this->params);
    }


    /**
     * Permet de scinder l'URL afin de récupérer $controller, $methond et $params[]
     */
    public function parseUrl()
    {
        // Vérifie si l'URL existe
        // La raison pour laquelle on utilise $_GET est parce qu'on utilise un fichier htaccess* pour éditer l'URL et l'enregistrer dans $_GET['url']
        if (isset($_GET['url'])) {
            // rtrim permet de retirer le dernier "/", explode permet de stocker les élements de l'URL séparés par un "/" dans un tableau.
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}
