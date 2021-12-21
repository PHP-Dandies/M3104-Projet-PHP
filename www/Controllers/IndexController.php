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
        $books = array(
            new book('title1', 'at1', 'A', 23),
            new book('title2', 'at2', 'B', 21),
            new book('title3', 'at3', 'C', 231),
            new book('title4', 'at4', 'D', 12414)
        );
        return $books;
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