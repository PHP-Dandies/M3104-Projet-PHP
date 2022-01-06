<?php

$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include $doc_root.'/HelperUtils.php';
include '../Utils/database.php';
start_page("test");
navbar();

$query = 'SELECT * FROM IDEA';
$Result = database::execute_query($query);
?>
    <div class="container" style="margin-top: 5px">
        <table>
            <caption>
                CAMPAGNE
            </caption>
            <thead>
            <tr>
                <th>IDEE</th>
                <th>VOIR</th>
                <th>METTRE EN OEUVRE</th>
                <th>ABANDONNER</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><?php echo $Result[0]['TITLE']?></td>
                <td><a class="button outline primary">Voir</a></td>
                <td><a class="button outline primary">Mettre en oeuvre</a></td>
                <td><a class="button outline">Abandonner</a></td>
            </tr>
            <tr>
                <td>Idée 2</td>
                <td><a class="button outline primary">Voir</a></td>
                <td><a class="button outline primary">Mettre en oeuvre</a></td>
                <td><a class="button outline">Abandonner</a></td>
            </tr>
            </tbody>
        </table>
        <br>
        <a class="button primary">Terminer la campagne</a>
        <br>
        <table>
            <caption>
                ANCIENNES CAMPAGNES
            </caption>
            <thead>
            <tr>
                <th>IDEE</th>
                <th>VOIR</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Idée 1</td>
                <td><a class="button outline primary">Voir</a></td>
            </tr>
            <tr>
                <td>Idée 2</td>
                <td><a class="button outline primary">Voir</a></td>
            </tr>
            </tbody>
        </table>
    </div>
<?php
end_page();
?>