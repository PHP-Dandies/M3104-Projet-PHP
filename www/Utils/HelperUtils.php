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
    echo '    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">'.PHP_EOL;
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
    if (isset ($_SESSION['role']) and $_SESSION['role'] === 'admin') {
        echo '              <a class="active" href="/admin">Espace Administrateur</a>'.PHP_EOL;
        echo '            <a class="active" href="/admin/campagnes/creer">Créer une nouvelle campagne</a>'.PHP_EOL;
        echo '             <a class="active" href="/admin/campagnes">Voir la liste des campagnes</a>'.PHP_EOL;
        echo '              <a class="active" href="/admin/utilisateurs">Voir la liste des utilisateurs</a>'.PHP_EOL;
    }
    elseif (isset($_SESSION['role']) and $_SESSION['role'] === 'organiser') {
        echo '              <a class="active" href="/organisateur">Espace Organisateur</button></a>' . PHP_EOL;
    }
    echo '        </div>'.PHP_EOL;
    echo '        <div class="nav-center">'.PHP_EOL;
    echo '            <a class="brand" href="/">E-Event.io</a>' .PHP_EOL;
    echo '        </div>'.PHP_EOL;
    echo '        <div class="nav-right">'.PHP_EOL;
    if (!isset($_SESSION['id'])) {
    echo '              <a class="button primary" href="/login">Login</a>' .PHP_EOL;
    } else {
    echo '              <a href="?controller=User&action=logout"><button class="button error">Logout</button></a>'.PHP_EOL;
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
