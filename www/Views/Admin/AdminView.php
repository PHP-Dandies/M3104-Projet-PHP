<?php
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include substr($doc_root, 0, -6).'/Utils/AutoLoader.php';
start_page("test");
navbar();
?>
<div class="container" style="margin-top: 5px">
    <h1 class="text-center"> Espace Administrateur </h1>
    <br>
    <div class="text-center">
        <a href="campaign/create">
    <button class="button success"> Créer une nouvelle campagne </button>
        </a>
        <br>
        <br>
        <a href="users/usermanagement">
    <button class="button error"> Gérer les utlisateurs </button>
        </a>
</div>
</div>