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
    <details class=dropdown>
        <summary class="button success">A propos ↓</summary>
        <div class=card>
            Bienvenue sur E-event_io ! Un site fabuleux où il fait bon vivre. C'est du remplissage parce que j'ai
            mieux à faire
            mais voilà je pensais à un résumé de ce que fait le site web ou un truc comme ça
        </div>
    </details>

    <div class="w-2/3 mx-auto">
        <?php if (!empty($ideas)) { ?>
        <div class="bg-white shadow-md rounded my-6">
            <h1 class="mb-4 font-semibold">Liste des idées disponibles</h1>
                <table class="text-left w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Image</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Titre</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Points</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Point actuel</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Voir les idées</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($ideas as $idea) { ?>
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-4 px-6 border-b border-gret-light">Mettre image ici</td>
                            <td class="py-4 px-6 border-b border-gret-light"><?php echo $idea["TITLE"] ?></td>
                            <td class="py-4 px-6 border-b border-gret-light">Goal : <?php echo $idea["GOAL"] ?></td>
                            <td class="py-4 px-6 border-b border-gret-light">Current Points : <?php echo $idea["TOTAL_POINTS"] ?></td>
                            <td class="py-4 px-6 border-b border-gret-light"><a class="text-grey-lighter font-bold py-2 px-4 rounded text-xm bg-green hover:bg-green-dark" href="idee/<?php echo $idea["IDEA_ID"] ?>">Voir</a></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
            </table>
        </div>
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
        <div class="bg-white shadow-md rounded my-6">
            <h1 class="mb-4 font-semibold">Liste des idées courament en délibération</h1>
            <table>
                <thead>
                    <tr>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Nom</th>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Points</th>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Voir les idées</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach ($currentDeliberation as $idea) { ?>
                    <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-gret-light"><?php echo $idea["TITLE"] ?></td>
                        <td class="py-4 px-6 border-b border-gret-light">Current Points : <?php echo $idea["TOTAL_POINTS"] ?></td>
                        <td class="py-4 px-6 border-b border-gret-light"><a class="text-grey-lighter font-bold py-2 px-4 rounded text-xm bg-blue hover:bg-blue-dark" href="idee/<?php echo $idea["IDEA_ID"] ?>">Voir</a></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
        <?php } if (!empty($lastCampaignResults)) { ?>
        <div class="bg-white shadow-md rounded my-6">
            <h1 class="mb-4 font-semibold">Liste des idées acceptées durant la dernière campagne</h1>
            <table>
                <thead>
                    <tr>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Nom</th>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Points</th>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Voir les idées</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach ($lastCampaignResults as $idea) { ?>
                    <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-gret-light"><?php echo $idea["TITLE"] ?></td>
                        <td class="py-4 px-6 border-b border-gret-light">Current Points : <?php echo $idea["TOTAL_POINTS"] ?></td>
                        <td class="py-4 px-6 border-b border-gret-light"><a class="text-grey-lighter font-bold py-2 px-4 rounded text-xm bg-blue hover:bg-blue-dark" href="idee/<?php echo $idea["IDEA_ID"] ?>">Voir</a></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
        <?php } ?>
    </div>
<?php
end_page();
?>