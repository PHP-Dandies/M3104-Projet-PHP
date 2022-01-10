<?php

abstract class Controller
{
    public function __construct()
    {

    }

    public function loadModel(string $model){
        $doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
        require_once ($doc_root . '/Models' . $model . '.php');
        $this->$model = new $model();
    }

    public function render(string $dossier, string $fichier, array $data = []){
        extract($data);
        ob_start();
        require_once ($doc_root .'/Views' . $dossier . '/'. strtolower(get_class($this)).'/'.$fichier.'.php');
        $content_for_layout = ob_get_clean();
        if ($this->layout == false){
            echo $content_for_layout;
        }
    }
}