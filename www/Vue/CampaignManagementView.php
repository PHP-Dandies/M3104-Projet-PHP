<?php
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include $doc_root.'/HelperUtils.php';
start_page("test");
navbar();
?>
    <div class="container" style="margin-top: 5px">
<div>
            <h1 class="text-center"> Campagnes en cours </h1>
            <table class="striped">
                <tr>
                    <td>Nom Campagne 1</td>
                    <td>DateDeb</td>
                    <td>DateFin</td>
                    <td><button class="button error">Interrompre</button></td>
                </tr>
                <tr>
                    <td>Nom Campagne 2</td>
                    <td>DateDeb</td>
                    <td>DateFin</td>
                    <td><button class="button error">Interrompre</button></td>
                </tr>
                <tr>
                    <td>Nom Campagne 3</td>
                    <td>DateDeb</td>
                    <td>DateFin</td>
                    <td><button class="button error">Interrompre</button></td>
                </tr>
            </table>
        </div>
        <br>
        <br>
        <details class="text-center" class=dropdown>
            <summary  class="button success">Créer une nouvelle Campagne  ↓ </summary>
            <div class=card>
                <p><a>
                        <input type="text" placeholder="Entrez le nom de votre nouvelle campagne">
                    </a></p>
                <p><a class="text-success">Date du début de cette nouvelle campagne : DateDeb</a></p>
                <p><a class="text-error">Date fin de cette nouvelle campagne : DateFin</a></p>
                <p><a>
                        <button class="button success">Enregistrer</button>
                    </a></p>
            </div>
        </details>
    </div>
<?php
end_page();
?>
