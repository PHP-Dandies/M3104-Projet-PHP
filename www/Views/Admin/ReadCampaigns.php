<?php
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include substr($doc_root, 0, -6).'/Utils/AutoLoader.php';
start_page("test");
navbar();
$campaigns = $data;
?>
    <div class="container" style="margin-top: 5px">
        <h1 class="text-center"> Campagnes en cours </h1>
        <?php
        echo'    <table class="striped">'.PHP_EOL;
        foreach ($campaigns as $campaign){
            echo'        <tr>'.PHP_EOL;
            echo'            <td>'.$campaign["TITLE"].'</td>'.PHP_EOL;
            echo'            <td>'.$campaign["BEG_DATE"].'</td>'.PHP_EOL;
            echo'            <td>'.$campaign["END_DATE"].'</td>'.PHP_EOL;
            echo'            <td><a href="campagnes/' . $campaign["CAMPAIGN_ID"] . '" class="button error">Modifier</a></td>'.PHP_EOL;
            echo'            <td><a href="campagnes/' . $campaign["CAMPAIGN_ID"] . '/modifier" class="button error">Modifier</a></td>'.PHP_EOL;
            echo'        </tr>'.PHP_EOL;
        }
        echo'    </table>'.PHP_EOL;
        ?>
        <br>
        <br>
        <details class="text-center" class=dropdown>
            <summary  class="button success">Créer une nouvelle Campagne  ↓ </summary>
            <div class=card>
                <p><input type="text" maxlength="25" placeholder="Entrez le nom de votre nouvelle campagne"></p>
                <p class="text-success"> Sélectionner le début de la campagne : <input type="date" class="text-success" ></p>
                <p class="text-error">Sélectionner la fin de la campagne : <input type="date" class="text-error"></p>
                <p>
                    <a>
                        <button class="button success" >Enregistrer</button>
                    </a></p>
            </div>
        </details>
    </div>
<?php
end_page();
?>