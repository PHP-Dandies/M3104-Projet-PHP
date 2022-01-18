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
if (isset($data['option'])) {
    $option = $data['option'];
}
?>

<section>
    <div class="container" style="margin-top: 5px">
        <details class="text-center">
            <summary class="button success">A propos ↓</summary>
            <div class=card>
                Bienvenue sur E-event_io ! Un site fabuleux où il fait bon vivre. C'est du remplissage parce que j'ai
                mieux à faire
                mais voilà je pensais à un résumé de ce que fait le site web ou un truc comme ça
            </div>
        </details>
        <?php if (!empty($ideas)) { ?>
        <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <caption class="text-center"><h1>Liste des idées disponibles</h1></caption>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Titre</th>
                        <th>But</th>
                        <th>Points</th>
                        <th>Voir</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                <?php
                foreach ($ideas as $idea) { ?>
                    <tr>
                        <td><img src="<?php echo $idea["PICTURE"] ?>" alt="l'image n'à pas pu être affichée"></td>
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
        </div>
    </div>
</section>
        <?php } else {
            if ($option === 'none') { ?>
        <p>Pas d'idées dans la campagne en cours</p>
            <?php } else if ($option === 'no_campaigns_scheduled') { ?>
        <p>Pas de campagnes prévues, restez à l'écoute...</p>
            <?php } else if ($option === 'campaign_scheduled') { ?>
        <p>Pas de campagne en cours... prochaine campagne prévue le <?php echo $nextCampaign["BEG_DATE"] ?></p>
            <?php }
        } ?>
        <?php if (isset($currentDeliberation) && !empty($currentDeliberation)) { ?>
<section>
    <div class="container" style="margin-top: 5px">
            <caption><h1>Liste des idées actuellement en délibération</h1></caption>
        <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Status</th>
                        <th>Voir</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                <?php
                foreach ($currentDeliberation as $idea) { ?>
                    <tr>
                        <td><?php echo $idea["TITLE"] ?></td>
                        <td>Status : <?php echo $idea["REALISED"] == 1 ? 'Acceptée' : 'En délibération' ?></td>
                        <td><a href="idee/<?php echo $idea["IDEA_ID"] ?>">Voir</a></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
        <?php } if (!empty($lastCampaignResults)) { ?>
<section>
    <div class="container" style="margin-top: 2px">
        <caption><h1>Liste des idées acceptées durant la dernière campagne</h1></caption>
        <div class="tbl-header">
            <table>
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Voir</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="tbl-content">
            <table>
                <tbody>
                <?php
                foreach ($lastCampaignResults as $idea) { ?>
                    <tr>
                        <td><?php echo $idea["TITLE"] ?></td>
                        <td><a href="idee/<?php echo $idea["IDEA_ID"] ?>">Voir</a></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
            </div>
        <?php } ?>
    </div>
</section>
    <script>
        $(window).on("load resize ", function (){
            var scrollWidth = $('.tbl-content').width() - $('.tbl-content').width();
            $('.tbl-header').css({'padding-right':scrollWidth});
        })
    </script>
<?php
end_page();
?>