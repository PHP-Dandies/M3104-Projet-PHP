<?php
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include_once $doc_root.'/../Utils/HelperUtils.php';
start_page("OrgaView");
navbar();
/** @var array $data */
?>
    <div class="container" style="margin-top: 5px">
        <table class="striped">
            <caption>Mes Idées</caption>
            <thead>
            <tr>
                <th>Title</th>
                <th>Goal</th>
                <th>Current Points</th>
                <th>Modifier</th>
            </tr>
            </thead>
            <?php
            foreach($data as $idea) {
                ?>
                <tr>
                    <td><?php echo $idea["TITLE"] ?></td>
                    <td><?php echo $idea["GOAL"] ?></td>
                    <td><?php echo $idea["TOTAL_POINTS"] ?></td>
                    <td><a href="idea/edit/<?php echo $idea["IDEA_ID"];?>">Modifier</a></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <a href="/idea/create">
            Créer une idée.
        </a>
    </div>
<?php
end_page();
?>