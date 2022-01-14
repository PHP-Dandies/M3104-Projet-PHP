<?php
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include substr($doc_root, 0, -6).'/Utils/AutoLoader.php';
start_page("test");
/** @var array $data */
$ideas = $data;
navbar();
?>
    <div class="container" style="margin-top: 5px">
        <details class=dropdown>
            <summary  class="button success">A propos ↓ </summary>
            <div class=card>
                Bienvenue sur E-event_io ! Un site fabuleux où il fait bon vivre. C'est du remplissage parce que j'ai mieux à faire
                mais voilà je pensais à un résumé de ce que fait le site web  ou un truc comme ça
            </div>
        </details>
                <table>
            <thead>
                <tr>
                    <th class="text-center">Liste des idées disponibles</th>
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