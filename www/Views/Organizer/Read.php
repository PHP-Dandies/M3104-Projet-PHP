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
    <table>
        <caption>Campagne en cours</caption>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Date de début</th>
                <th>Date de fin</th>
                <th>Date de fin de délibération</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $campaign->getTitle() ?></td>
                <td><?php echo $campaign->getBegDate() ?></td>
                <td><?php echo $campaign->getEndDate() ?></td>
                <td><?php echo $campaign->getDelibEndDate() ?></td>
            </tr>
        </tbody>
    </table>

        <?php if (!empty($ideas)) { ?>
    <div class="container" style="margin-top: 5px">
    <table class="striped">
        <caption>Mes Idées</caption>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Points</th>
                <th>Modifier</th>
            </tr>
        </thead>
            <?php
                foreach($ideas as $idea) {
                    ?>
                    <tr>
                        <td><?php echo $idea["TITLE"] ?></td>
                        <td><?php echo $idea["GOAL"] ?></td>
                        <td><?php echo $idea["TOTAL_POINTS"] ?></td>
                        <td><a href="organisateur/modifier/<?php echo $idea["IDEA_ID"];?>">Modifier</a></td>
                    </tr>
                    <?php 
                }
            ?>
        </table>

    </div>
<?php } else {  // !empty($ideas) ?>
    <h1>Vous n'avez créée aucune idée</h1>
            <?php
        } ?>
    <a href="/organisateur/creer">
        Créer une idée
    </a>
    <?php } // $campaign->getStatus() === 'running'
} else { // !empty($campaign) ?>
    <h1>Pas de campagnes en cours, ni prévues</h1>
    <a href="/">Retourner à l'accueil</a>
<?php
}
end_page();
?>