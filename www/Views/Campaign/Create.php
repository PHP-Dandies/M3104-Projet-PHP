<?php
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include $doc_root.'/M3104-Projet-PHP/www'.'/Utils/HelperUtils.php';
start_page("test");
navbar();
?>
    <div class="container" style="margin-top: 5px">
        <h1 class="text-center"> Créer une nouvelle campagne </h1>
    <details class="text-center" class=dropdown>

            <summary  class="button success">Créer une nouvelle Campagne  ↓ </summary>
            <div class=card>
                <form action="../../Scripts/AddCampaign.php" method="post">
                <p><input type="text" name="title" id "title" maxlength="25" placeholder="Entrez le nom de votre nouvelle campagne"></p>
                <p class="text-success"> Sélectionner le début de la campagne : <input type="date" name="datedeb" id="datedeb" class="text-success" ></p>
                <p class="text-error">Sélectionner la fin de la campagne : <input type="date" name="datefin" id="datefin" class="text-error"></p>
                <p><a>
                        <input type="submit" name="test" value="Enregistrer" >
                    </a></p>
                </form>
            </div>
        </details>