<?php
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include $doc_root.'/HelperUtils.php';
start_page("OrgaView");
navbar();
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
                foreach($my_ideas as $idea) {
                    ?>
                    <tr>
                        <td><?php echo $idea["TITLE"] ?></td>
                        <td><?php echo $idea["GOAL"] ?></td>
                        <td><?php echo $idea["TOTAL_POINTS"] ?></td>
                        <td><a href="idea/edit/<?php echo $idea["IDEA"] ?>">Modifier</a></td>
                    </tr>
                    <?php 
                }
            ?>
            </tbody>
        </table>
    </div>
<?php
end_page();
?>