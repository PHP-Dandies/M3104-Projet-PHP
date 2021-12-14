<?php
require_once 'Controller.php';

class IndexController extends Controller
{
    public function __construct()
    {

    }

    public function create() {
        return 'create';
    }

    public function read() {
        return 'read';
    }

    public function update() {
        return 'update';
    }

    public function delete() {
        return 'delete';
    }
}