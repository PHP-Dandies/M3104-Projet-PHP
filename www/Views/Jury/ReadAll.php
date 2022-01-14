<?php
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include substr($doc_root, 0, -6).'/Utils/AutoLoader.php';
start_page("test");
/** @var array $data */
$ideas = $data;
navbar();
?>
        <table class="ze">
            <tr class="sd">
                <th class="thr">Image</th>
                <th class="thr">Nom</th>
                <th class="thr">Objectif</th>
                <th class="thr">Point actuel</th>
                <th class="thr">Affichage</th>
            </tr>

            <?php
            foreach ($ideas as $idea) { ?>
                <tr>
                    <td class="thi">Mettre image ici</td>
                    <td class="thi"><?php echo $idea["TITLE"] ?></td>
                    <td class="thi">Goal : <?php echo $idea["GOAL"] ?></td>
                    <td class="thi">Current Points : <?php echo $idea["TOTAL_POINTS"] ?></td>
                    <td class="thi"><a href="jury/idee/<?php echo $idea["IDEA_ID"] ?>">Voir</a></td>
                </tr>
                <?php
            }
            ?>
        </table>
<?php
end_page();
?>