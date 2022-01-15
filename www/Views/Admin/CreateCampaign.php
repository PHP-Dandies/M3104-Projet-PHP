<?php
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include substr($doc_root, 0, -6).'/Utils/AutoLoader.php';
start_page("test");
navbar();
?>
    <div class="container" style="margin-top: 5px">
        <h1 class="text-center"> Créer une nouvelle campagne </h1>
    <details class="text-center" class=dropdown>
        <summary  class="button success">Créer une nouvelle Campagne  ↓ </summary>
        <div class=card>
            <form action="../../Scripts/AddCampaign.php" , method="post">
            <p class="text-error">Entrer le titre de la campagne : <input type="text" name="title" id "title" maxlength="25" placeholder="Entrez le nom de votre nouvelle campagne"></p>
            <p class="text-success"> Sélectionner le début de la campagne : <input type="date" name="datedeb" id="datedeb" class="text-success" ></p>
            <p class="text-error">Sélectionner la fin de la campagne : <input type="date" name="datefin" id="datefin" class="text-error"></p>
            <p class="text-success">Sélectionner le nombre de points à attribuer aux donateurs : <input type="number" name="points" id="points" min="1"></p>
            <p><a><input type="submit" name="test" value="Enregistrer" ></a></p>
            </form>
        </div>
    </details>
    </div>