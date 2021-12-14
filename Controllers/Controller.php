<?php

abstract class Controller
{
    public function __construct()
    {

    }

    public abstract function create();

    public abstract function read();

    public abstract function update();

    public abstract function delete();
}