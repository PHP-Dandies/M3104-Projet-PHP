<?php
start_page("test");
navbar();
returnButton('.');
?>
    <h1 class="text-center"> Espace Administrateur </h1>
    <div class="container">
        <a href="admin/campagnes"><button class="button success">Gérer les campagnes</button></a>
        <a href="admin/utilisateurs"><button class="button error">Gérer les utilisateurs</button></a>
    </div>