<?php
start_page("test");
navbar();
returnButton('.');
?>
<div class="">
    <h1 class="text-center mb-5"> Espace Administrateur </h1>
    <div class="text-center">
        <a href="admin/campagnes"><button class="bg-transparent hover:bg-blue text-blue-dark font-semibold hover:text-white py-2 px-4 border border-blue hover:border-transparent rounded">Gérer les campagnes</button></a>
        <a href="admin/utilisateurs"><button class="bg-transparent hover:bg-grey text-grey-dark font-semibold hover:text-white py-2 px-4 border border-grey hover:border-transparent rounded">Gérer les utilisateurs</button></a>
    </div>
</div>
