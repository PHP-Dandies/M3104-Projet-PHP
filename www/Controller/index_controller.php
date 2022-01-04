<?php
class Controller {
    public function __construct() {

    }

    public function read() {
        $out = '<!DOCTYPE html>'.PHP_EOL;
        $out .='<html>'.PHP_EOL.'<head>'.PHP_EOL;
        $out .='    <title>Test</title>';
        $out .=PHP_EOL.'</head>'.PHP_EOL;
        $out .='<body>'.PHP_EOL;
        $out .='    <h1>This is a Heading</h1>'.PHP_EOL;
        $out .='    <p>This is a paragraph.</p>'.PHP_EOL;
        $out .='</body>'.PHP_EOL;
        $out .='</html>';
        return $out;
    }

    public function update() {
        return "Update !";
    }

    public function delete() {
        return "Delete !";
    }

    public function create() {
        return "Create !";
    }
}