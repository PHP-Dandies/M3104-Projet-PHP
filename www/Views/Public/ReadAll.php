<?php
start_page("test");
navbar();
/** @var array $data */
if (isset($data['ideas'])) {
    $ideas = $data['ideas'];
}
if (isset($data['next_campaign'])) {
    $nextCampaign = $data['next_campaign'];
}
if (isset($data['last_campaign_result'])) {
    $lastCampaignResults = $data['last_campaign_result'];
}
if (isset($data['ideas_delib'])) {
    $currentDeliberation = $data['ideas_delib'];
}
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
                    <th class="text-center">Liste des idées disponibles <?php var_dump($_SESSION); ?></th>
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
                    <td><a href="idee/<?php echo $idea["IDEA_ID"] ?>">Voir</a></td>
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
        <?php if (isset($currentDeliberation) && !empty($currentDeliberation)) { ?>
        <table>
            <thead>
                <tr>
                    <th class="text-center">Liste des idées courament en délibération</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($currentDeliberation as $idea) { ?>
                <tr>
                    <td><?php echo $idea["TITLE"] ?></td>
                    <td>Current Points : <?php echo $idea["TOTAL_POINTS"] ?></td>
                    <td><a href="idee/<?php echo $idea["IDEA_ID"] ?>">Voir</a></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <?php } if (!empty($lastCampaignResults)) { ?>
        <table>
            <thead>
                <tr>
                    <th class="text-center">Liste des idées acceptées durant la dernière campagne</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($lastCampaignResults as $idea) { ?>
                <tr>
                    <td><?php echo $idea["TITLE"] ?></td>
                    <td>Current Points : <?php echo $idea["TOTAL_POINTS"] ?></td>
                    <td><a href="idee/<?php echo $idea["IDEA_ID"] ?>">Voir</a></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <?php } ?>
    </div>
<?php
end_page();
?>