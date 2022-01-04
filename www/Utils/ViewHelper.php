<?php

class ViewHelper
{
    public static function display($controller_instance, $view_name, $data = array())
    {
        extract($data, EXTR_OVERWRITE);
        unset($data);
        ob_start();
        include '../Views/'
            . str_replace('Controller', '', get_class($controller_instance))
            . '/' . $view_name
            . '.php';
        ob_end_flush();
        return ob_get_clean();
    }
}