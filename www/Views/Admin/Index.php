<?php
start_page("test");
navbar();
returnButton('.');
?>
    <div class="container">
        <h1 class="text-center"> Espace Administrateur </h1>
        <div class="row">
            <a style="margin:1em" class="row is-full-width" href="admin/campagnes" ><button class="text-center button is-full-width">Gérer les campagnes</button></a>
            <a style="margin:1em" class="row is-full-width" href="admin/utilisateurs"><button class="button is-full-width">Gérer les utilisateurs</button></a>
        </div>
    </div>