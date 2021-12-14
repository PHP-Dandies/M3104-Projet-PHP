<?php
spl_autoload_register(function ($name) {
    $project_dir = dirname(__DIR__);

    $file_name = "";

    var_dump($name);

    if (str_contains($name, "Controller")) {
        $file_name = $project_dir . '/www/Controllers/'. $name;
    }
    else if (str_contains($name, "Models")) {
        $file_name = $project_dir . '/www/Models/'. $name;
    }
    else if (str_contains($name, "View")) {
        $file_name = $project_dir . '/www/Views/'. $name;
    } else {
        $file_name = $project_dir . '/www/' . $name;
    }

    $file_name .= '.php';

    if (file_exists($file_name)) {
        include_once $file_name;
    } else {
        throw new Exception("$file_name not found", -1);
    }
});
