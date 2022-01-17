<?php


start_page("test");
navbar();
$ideaModel = new IdeaModel();
$query = 'SELECT * FROM IDEA';
$Result = database::executeQuery($query);
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
                <th>SELECTIONNER</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($Result as $res){?>
            <tr>
                <td><?php var_dump($res['TITLE']);?> </td>
                <td><a class="button outline primary">Voir</a></td>
                <td><a class="button outline primary">Selectionner</a></td>
            </tr>
            <?php }?>
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
            <?php foreach ($Result as $res){?>
            <tr>
                <td>Idée 1</td>
                <td><a class="button outline primary">Voir</a></td>
            </tr>
            <?php }?>
            </tbody>
        </table>
    </div>
<?php
end_page();
?>