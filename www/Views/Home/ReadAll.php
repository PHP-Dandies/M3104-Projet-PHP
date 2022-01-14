<?php
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include substr($doc_root, 0, -6).'/Utils/AutoLoader.php';
start_page("test");
/** @var array $data */
$ideas = $data;
navbar();
?>
    <div class="container" style="margin-top: 5px">
        <table>
            <thead>
                <tr>
                    <th>Bienvenue sur notre site </th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($ideas as $idea) { ?>
                    <tr>
                        <td>Mettre image ici</td>
                        <td><?php echo $idea["TITLE"] ?></td>
                        <td>Goal : <?php echo $idea["GOAL"] ?></td>
                        <td>Current Points : <?php echo $idea["TOTAL_POINTS"] ?></td>
                        <td><a href="idea/<?php echo $idea["IDEA_ID"] ?>">Voir</a></td>
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