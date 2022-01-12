<?php
function start_page($title)
{
    echo '<!DOCTYPE html>'.PHP_EOL;
    echo '<html lang="fr">'.PHP_EOL;
    echo '<head>'.PHP_EOL;
    echo '    <meta charset="UTF-8">'.PHP_EOL;
    echo '    <link rel="stylesheet" href="https://unpkg.com/chota@latest">'.PHP_EOL;
    echo '    <link rel="stylesheet" href="/PhP_Dandies/www/CSS/style.css" type="text/css" media="all">'.PHP_EOL;
    echo '    <link rel="stylesheet" href="/PHP_Dandies/www/CSS/style2.css" type="text/css" media="all">'.PHP_EOL;
    echo '    <title>'.$title.'</title>'.PHP_EOL;
    echo '</head>'.PHP_EOL;
    echo '<body style="min-height: 100vh">'.PHP_EOL;
}

function navbar()
{
    echo '    <nav class="nav">'.PHP_EOL;
    echo '        <div class="nav-left tabs">'.PHP_EOL;
    echo '            <a class="active">Link 1</a>'.PHP_EOL;
    echo '            <a>Link 2</a>'.PHP_EOL;
    echo '        </div>'.PHP_EOL;
    echo '        <div class="nav-center">'.PHP_EOL;
    echo '            <a class="brand" href="/">E-Event.io</a>' .PHP_EOL;
    echo '        </div>'.PHP_EOL;
    echo '        <div class="nav-right">'.PHP_EOL;
    echo '              <a class="button primary" href="/?a=login">Login</a>' .PHP_EOL;
    echo '        </div>'.PHP_EOL;
    echo '    </nav>'.PHP_EOL;
}

function end_page()
{
    echo '    <footer>'.PHP_EOL;
    echo '    </footer>'.PHP_EOL;
    echo '</body>'.PHP_EOL;
    echo '</html>'.PHP_EOL;
}