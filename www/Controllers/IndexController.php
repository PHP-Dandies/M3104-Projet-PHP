<?php
include 'AutoLoader.php';

class IndexController extends Controller
{
    public function create()
    {
        return 'create';
    }

    public function index()
    {
        return 'Cest la page d acceuil';
    }

    public function read()
    {
        $utilisateur = 'caca';

        return ViewHelper::display(
            $this,
            'read',
            array('utilisateur', $utilisateur)
        );
        /*
        return array(
            new Book('title1', 'at1', 'A', 23),
            new Book('title2', 'at2', 'B', 21),
            new Book('title3', 'at3', 'C', 231),
            new Book('title4', 'at4', 'D', 12414)
        );
        */
    }

    public function update()
    {
        return 'update';
    }

    public function delete()
    {
        return 'delete';
    }
}