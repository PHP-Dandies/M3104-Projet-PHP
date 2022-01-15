<?php
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include substr($doc_root, 0, -6).'/Utils/AutoLoader.php';
start_page("test");
navbar();
$campaigns = $data;
?>
        <h1 class="p-5 h-screen bg-gray-100"> Campagnes en cours </h1>
        <?php
        echo '<template>'.PHP_EOL;
        echo '    <div class="p-5 h-screen bg-gray-100">'.PHP_EOL;
        echo '        <table class="w-full">'.PHP_EOL;
        echo '            <thead class="bg-gray-50 border-b-2 border-gray-200">'.PHP_EOL;
        echo '                <tr>'.PHP_EOL;
        echo '                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Titre</th>'.PHP_EOL;
        echo '                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Date de début</th>'.PHP_EOL;
        echo '                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Date de fin</th>'.PHP_EOL;
        echo '                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Bouton</th>'.PHP_EOL;
        echo '                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Bouton</th>'.PHP_EOL;
        echo '                </tr>'.PHP_EOL;
        echo '            </thead>'.PHP_EOL;
        foreach ($campaigns as $campaign){
            echo '        <tbody class="divide-y divide-gray-100">'.PHP_EOL;
            echo '            <tr class="bg-white">'.PHP_EOL;
            echo '                <td class="p-3 text-sm text-gray-700"><spam class="p-1.5 text-xs font-medium uppercase tracking-wider text-green-800 bg-green-200 rounded-lg bg-opacity-50">'.$campaign["TITLE"].'</spam></td>'.PHP_EOL;
            echo '                <td class="p-3 text-sm text-gray-700">'.$campaign["BEG_DATE"].'</td>'.PHP_EOL;
            echo '                <td class="p-3 text-sm text-gray-700">'.$campaign["END_DATE"].'</td>'.PHP_EOL;
            echo '                <td class="p-3 text-sm text-gray-700"><a class="font-bold text-blue-500 hover:underline" href="campagnes/' . $campaign["CAMPAIGN_ID"] . '" class="button error">Modifier</a></td>'.PHP_EOL;
            echo '                <td class="p-3 text-sm text-gray-700"><a class="font-bold text-blue-500 hover:underline" href="campagnes/' . $campaign["CAMPAIGN_ID"] . '/modifier" class="button error">Modifier</a></td>'.PHP_EOL;
            echo '            </tr>'.PHP_EOL;
            echo '        </tbody>'.PHP_EOL;
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
<?php
end_page();
?>