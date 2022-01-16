<?php
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include substr($doc_root, 0, -6).'/Utils/AutoLoader.php';
start_page("test");
navbar();
returnButton('.');
/** @var array $data */
$campaigns = $data;
for ($i = 0, $iMax = count($campaigns); $i < $iMax; ++$i) {
    $campaigns[$i] = CampaignModel::constructFromArray($campaigns[$i]);
}
?>
    <div class="container" style="margin-top: 5px">
        <h1 class="text-center"> Campagnes en cours </h1>
        <?php
        echo'    <table class="striped">'.PHP_EOL;
        /** @var CampaignModel $campaign */
        foreach ($campaigns as $campaign){
            echo'        <tr>'.PHP_EOL;
            echo'            <td>'.$campaign->getTitle().'</td>'.PHP_EOL;
            echo'            <td>'.$campaign->getBegDate().'</td>'.PHP_EOL;
            echo'            <td>'.$campaign->getEndDate().'</td>'.PHP_EOL;
            echo'            <td><a href="campagnes/' . $campaign->getID() . '" class="button error">Modifier</a></td>'.PHP_EOL;
            echo'            <td><a href="campagnes/' . $campaign->getID() . '/modifier" class="button error">Modifier</a></td>'.PHP_EOL;
            echo'        </tr>'.PHP_EOL;
        }
        echo'    </table>'.PHP_EOL;
        ?>
        <a href="campagnes/creer"><button>Creer une nouvelle campagne</button></a>
    </div>
<?php
end_page();
?>