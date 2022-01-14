<?php
class ViewHelper
{
    public static function display($controller_instance, $view_name, $data = array())
    {
        extract($data, EXTR_OVERWRITE);
        echo dirname(__DIR__) . '/Views/'
        . str_replace('Controller', '', get_class($controller_instance))
        . '/' . $view_name
        . '.php';
        include dirname(__DIR__) . '/Views/'
            . str_replace('Controller', '', get_class($controller_instance))
            . '/' . $view_name
            . '.php';
    }
}