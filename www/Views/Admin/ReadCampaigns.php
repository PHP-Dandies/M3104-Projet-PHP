<?php
start_page("test");
navbar();
returnButton('.');
/** @var array $data */
$campaigns = $data;
for ($i = 0, $iMax = count($campaigns); $i < $iMax; ++$i){
    $campaigns[$i] = CampaignModel::constructFromArray($campaigns[$i]);
}
?>

    <div class="w-2/3 mx-auto">
        <div class="bg-white shadow-md rounded my-6">
            <h1 class="text-3xl"> Campagnes en cours </h1>
            <table class="text-left w-full border-collapse">
                <thead>
                <tr>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Titre</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Date de début</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Date de fin</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Date de fin des délibérations</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Voir les idées</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Modifier</th>
                </tr>
                </thead>
                <tbody>
                <?php
                /** @var CampaignModel $campaign */ foreach ($campaigns as $campaign) { ?>
                    <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-gret-light"><?php echo $campaign->getTitle() ?></td>
                        <td class="py-4 px-6 border-b border-gret-light"><?php echo $campaign->getBegDate() ?></td>
                        <td class="py-4 px-6 border-b border-gret-light"><?php echo $campaign->getEndDate() ?></td>
                        <td class="py-4 px-6 border-b border-gret-light"><?php echo $campaign->getDelibEndDate() ?></td>
                        <td class="py-4 px-6 border-b border-gret-light"><a class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark" href="campagnes/<?php echo $campaign->getID() ?>">Voir</a></td>
                        <td class="py-4 px-6 border-b border-gret-light"><a class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-blue-dark" href="campagnes/<?php echo $campaign->getID() ?>/modifier">Modifier</a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <a class="h-10 px-5 text-indigo-700 transition-colors duration-150 border border-indigo-500 rounded-lg focus:shadow-outline hover:bg-indigo-500 hover:text-indigo-100" href="campagnes/creer"><button>Creer une nouvelle campagne</button></a>
        </div>
    </div>
<?php
end_page();
?>