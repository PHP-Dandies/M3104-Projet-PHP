<?php
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include $doc_root.'/HelperUtils.php';
start_page("test");
navbar();
$campaigns = array(array('CAMPAIGN_ID'  => 1,'TITLE' => 'JSP', 'BEG_DATE' => '2021-01-01', 'END_DATE' => '2021-04-04'),
    array('CAMPAIGN_ID'  => 2, 'TITLE' => 'TEST','BEG_DATE' => '2019-01-01', 'END_DATE' => '2019-04-04'),
    array('CAMPAIGN_ID'  => 3, 'TITLE' => 'CAMP', 'BEG_DATE' => '2020-01-01', 'END_DATE' => '2020-04-04'));
?>
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
            echo'            <td><button class="button error">Interrompre</button></td>'.PHP_EOL;
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
                <p><a>
                        <button class="button success" >Enregistrer</button>
                    </a></p>
            </div>
        </details>
    </div>
<?php
end_page();
?>