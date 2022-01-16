<?php
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include substr($doc_root, 0, -6).'/Utils/AutoLoader.php';
start_page("test");
/** @var array $data */
$ideas = $data;
navbar();
/** @var array $data */
if (isset($data['ideas'])) {
    $ideas = $data['ideas'];
} elseif (isset($data['next_campaign'])) {
    $nextCampaign = $data['next_campaign'];
} elseif (isset($data['last_campaign_results'])) {
    $lastCampaignResults = $data['last_campaign_results'];
}
var_dump($lastCampaignResults);die();
$option = $data['option'];
?>
    <div class="container" style="margin-top: 5px">
        <details class=dropdown>
            <summary class="button success">A propos ↓</summary>
            <div class=card>
                Bienvenue sur E-event_io ! Un site fabuleux où il fait bon vivre. C'est du remplissage parce que j'ai
                mieux à faire
                mais voilà je pensais à un résumé de ce que fait le site web ou un truc comme ça
            </div>
        </details>
        <?php if (!empty($ideas)) { ?>
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
                    <td><a href="idee<?php echo $idea["IDEA_ID"] ?>">Voir</a></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <?php } else {
            if ($option === 'none') { ?>
        <p>Pas d'idées dans le campagne en cours</p>
            <?php } else if ($option === 'next_campaign') { ?>
        <p>Pas de campagnes en cours, prochaine campagne prévue le : <?php echo $nextCampaign["BEG_DATE"] ?> </p>
            <?php } else if ($option === 'no_campaigns_scheduled') { ?>
        <p>Pas de campagnes prévues, restez à l'écoute...</p>
            <?php }
        } ?>
        <?php if (!empty($lastCampaign)) { ?>

        <?php } ?>
    </div>
<?php
end_page();
?>