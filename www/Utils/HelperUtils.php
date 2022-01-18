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
    echo '    <meta charset="UTF-8">'.PHP_EOL;
    echo '    <link rel="stylesheet" href="https://unpkg.com/chota@latest">'.PHP_EOL;
    echo '    <link rel="stylesheet" href="/css/style.css" type="text/css" media="all">'.PHP_EOL;
    echo '    <title>'.$title.'</title>'.PHP_EOL;
    echo '</head>'.PHP_EOL;
    echo '<body style="min-height: 100vh" class="set">'.PHP_EOL;
}

function returnButton($path) {
    echo "  <a href=\"$path\">Retour</a>" . PHP_EOL;
}

function navbar()
{
    echo '    <nav class="nav">'.PHP_EOL;

    echo '        <div class="nav-left tabs">'.PHP_EOL;

    if (isset ($_SESSION['role']) and $_SESSION['role'] === 'admin') {
        echo '              <a class="active" href="/admin"><button class="button success">Espace Administrateur</button></a>'.PHP_EOL;
    }
    if(isset ($_SESSION['role']) and $_SESSION['role'] ==='organizer'){
        echo '            <a href="/organisateur"><button class="button success">Espace Organisateur</button></a>'.PHP_EOL;
    }
    if(isset ($_SESSION['role']) and $_SESSION['role'] ==='jury'){
        echo '            <a href="/jury"><button class="button success">Espace Jury</button></a>'.PHP_EOL;
    }
    echo '        </div>'.PHP_EOL;
    echo '        <div class="nav-center">'.PHP_EOL;
    echo '            <a class="text-center" href="/"><img class="text-center" src="../public/images/unknown.png" alt="nom trouvé"/></a>' .PHP_EOL;
    echo '        </div>'.PHP_EOL;
    echo '        <div class="nav-right">'.PHP_EOL;
    if(!empty($_SESSION)){
        echo '              <a href="?controller=User&action=logout"><button class="button error">Logout</button></a>'.PHP_EOL;
    }
    if(empty($_SESSION)){
        echo '              <a class="button primary" href="/login">Login</a>' .PHP_EOL;
    }
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
