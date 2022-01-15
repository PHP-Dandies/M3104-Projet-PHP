<?php
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include substr($doc_root, 0, -6) . '/Utils/AutoLoader.php';
start_page("test");
navbar();
?>
    <h1 class="text-center"> Espace Administrateur </h1>
    <div class="container">
        <a href="admin/campagnes"><button class="button success">Gérer les campagnes</button></a>
        <a href="admin/utilisateurs"><button class="button error">Gérer les utilisateurs</button></a>
    </div>