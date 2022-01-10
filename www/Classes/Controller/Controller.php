<?php

class Controller
{
    public function __construct()
    {

    }
    //Instancie un Model choisit en paramètre
    public function loadModel(string $model)
    {
        $doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
        include_once('../../Models/' . $model . 'php');
        $this->$model = new $model();
    }

    //
    public function render(string $dossier ,string $fichier, array $data = []){
        // Récupère les données et les extrait sous forme de variables
        extract($data);

        // Crée le chemin et inclut le fichier de vue
        include_once($doc_root .'Views/'. $dossier . '/'.strtolower(get_class($this)).'/'.$fichier.'.php');
    }

    //Ce code et cette classe sont inspirés/trouvés sur ce site : https://nouvelle-techno.fr/articles/live-coding-introduction-au-mvc-en-php
}
