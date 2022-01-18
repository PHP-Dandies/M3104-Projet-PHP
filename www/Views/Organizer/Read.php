<?php
/** @var array $data */
$campaign = $data["campaign"];
$ideas = $data["ideas"];
start_page("OrgaView");
navbar();
if (!empty($campaign)) {
    /** @var CampaignModel $campaign */
    $campaign = CampaignModel::constructFromArray($campaign);
    if ($campaign->getStatus() === 'running') { ?>
<div class="w-2/3 mx-auto">
    <div class="bg-white shadow -md rounded my-6 mx-auto">
        <h1 class="mb-4 font-semibold">Campagne en cours</h1>
        <table class="text-left w-full border-collapse">
            <thead>
                <tr>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Titre</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Date de début</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Date de fin</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Date de fin de délibération</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover:bg-grey-lighter">
                    <td class="py-4 px-6 border-b border-gret-light"><?php echo $campaign->getTitle() ?></td>
                    <td class="py-4 px-6 border-b border-gret-light"><?php echo $campaign->getBegDate() ?></td>
                    <td class="py-4 px-6 border-b border-gret-light"><?php echo $campaign->getEndDate() ?></td>
                    <td class="py-4 px-6 border-b border-gret-light"><?php echo $campaign->getDelibEndDate() ?></td>
                </tr>
            </tbody>
        </table>
    </div>

        <?php if (!empty($ideas)) { ?>
    <div class="bg-white shadow -md rounded my-6 mx-auto">
        <h1 class="mb-4 font-semibold">Mes idées</h1>
            <table class="text-left w-full border-collapse">
                <thead>
                    <tr>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Titre</th>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Points</th>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Total des points</th>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Modifier</th>
                    </tr>
                </thead>
                    <?php
                        foreach($ideas as $idea) {
                            ?>
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-gret-light"><?php echo $idea["TITLE"] ?></td>
                                <td class="py-4 px-6 border-b border-gret-light"><?php echo $idea["GOAL"] ?></td>
                                <td class="py-4 px-6 border-b border-gret-light"><?php echo $idea["TOTAL_POINTS"] ?></td>
                                <td class="py-4 px-6 border-b border-gret-light"><a class="text-grey-lighter font-bold py-2 px-4 rounded text-xm bg-green hover:bg-green-dark" href="organisateur/modifier/<?php echo $idea["IDEA_ID"];?>">Modifier</a></td>
                            </tr>
                            <?php
                        }
                    ?>
                </table>

    </div>
</div>
<?php } else {  // !empty($ideas) ?>
    <h1>Vous n'avez créée aucune idée</h1>
            <?php
        } ?>
    <div class="text-center">
        <a class="p-4 pl-7 pr-7 bg-transparent border-2 border-indigo-500 text-indigo-500 text-lg rounded-lg transition-colors duration-700 transform hover:bg-indigo-500 hover:text-gray-100 focus:border-4 focus:border-indigo-300" href="/organisateur/creer">
            Créer une idée
        </a>
    </div>
    <?php } // $campaign->getStatus() === 'running'
} else { // !empty($campaign) ?>
    <h1>Pas de campagnes en cours, ni prévues</h1>
    <a href="/">Retourner à l'accueil</a>
<?php
}
end_page();
?>