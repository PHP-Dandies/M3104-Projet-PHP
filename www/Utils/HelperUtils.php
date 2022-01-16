<?php
function displayErrors(array $errors) {
    foreach($errors as $error) {?>
        <p><?php echo $error ?></p>
<?php
    }
}
function start_page($title)
{
    echo '<!DOCTYPE html>'.PHP_EOL;
    echo '<html lang="fr">'.PHP_EOL;
    echo '<head>'.PHP_EOL;
    echo '    <meta charset="utf-8">'.PHP_EOL;
    echo '    <link rel="stylesheet" href="https://unpkg.com/chota@latest">'.PHP_EOL;
    echo '    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">'.PHP_EOL;
    echo '    <link rel="stylesheet" href="/CSS/style.css" type="text/css" media="all">' .PHP_EOL;
    echo '    <link rel="stylesheet" href="/CSS/style2.css" type="text/css" media="all">' .PHP_EOL;
    echo '    <title>'.$title.'</title>'.PHP_EOL;
    echo '</head>'.PHP_EOL;
    echo '<body style="min-height: 100vh">'.PHP_EOL;
}

function returnButton($path) {
    echo "  <a href=\"$path\">Retour</a>";
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
