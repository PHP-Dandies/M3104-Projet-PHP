<?php
spl_autoload_register(function ($name) {
    $projectDir = dirname(__DIR__);

    foreach (glob("./Utils/*.php") as $fileName) {
        if (strpos($fileName, 'CustomAutoLoad.php') <= 0) {
            include_once $fileName;
        }
    }

    $fileName = "";

    var_dump($name);

    if (str_contains($name, "Controller")) {
        $fileName = $projectDir . '/www/Controllers/'. $name;
    }
    else if (str_contains($name, "Models")) {
        $fileName = $projectDir . '/www/Models/'. $name;
    }
    else if (str_contains($name, "View")) {
        $fileName = $projectDir . '/www/Views/'. $name;
    } else {
        $fileName = $projectDir . '/www/' . $name;
    }

    $fileName .= '.php';

    if (file_exists($fileName)) {
        include_once $fileName;
    } else {
        throw new Exception("$fileName not found", -1);
    }
});
