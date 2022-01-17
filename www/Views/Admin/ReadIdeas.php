<?php

start_page("test");
/** @var array $data */
$ideas = $data;
navbar();
returnButton('.');
if (empty($ideas)) {
    echo "<h2>Aucune idées n'ont été publiées dans cette campagne !</h2>";
} else {
?>
    <div class="container" style="margin-top: 5px">
        <table class="table-auto">
            <thead>
            <tr>
                <th>Idées</th>
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
                    <td><a href="<?php echo $idea['CAMPAIGN_ID'] . '/idee' . $idea['IDEA_ID'] ?>">Voir</a></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
<?php
} // else
end_page();
?>