<?php
/** @var array $data */
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include substr($doc_root, 0, -6).'/Utils/AutoLoader.php';
start_page("test");
navbar();
/** @var CampaignModel $campaign */
var_dump($data['campaign']);
die();
$campaign = CampaignModel::constructFromArray($data['campaign']);
if (isset($data['errors'])) {
    $errors = $data['errors'];
}
?>
    <div>
        <form action="modifier/?controller=Admin&action=modifyCampaign" method="post">
            <input type="hidden" name="ID" value="<?php echo $campaign->getID() ?>">
            <label for="title"> Titre actuel : <?php echo $campaign->getTitle();?></label>
            <input id="title"
                   type="text"
                   name="title"
                   value="<?php echo $campaign->getTitle();?>"
                   placeholder="<?php echo $campaign->getTitle();?>"
                    <?php if ($campaign->isOver()) {echo 'disabled';} ?>>

            <label for="beg_date"> Changer la date de début : </label>
            <input type="date" id="beg_date" name="begdate"
                   value="<?php echo $campaign->getBegDate() ?>" min="<?php echo date('Y-m-d') ?>"
                    <?php if (!$campaign->isScheduled()) {echo 'disabled';}?>>

            <label for="end_date"> Changer la date de fin : </label>
            <input type="date" id="end_date" name="enddate"
                   value="<?php echo $campaign->getEndDate() ?>" min="<?php echo date('Y-m-d') ?>"
                    <?php if ($campaign->isOver() || $campaign->isInDeliberation()) echo 'disabled'?>>

            <label for="delib_date"> Changer la date de fin de délibération : </label>
            <input type="date" id="delib_date" name="delibenddate"
                   value="<?php echo $campaign->getDelibEndDate() ?>"
                <?php if ($campaign->isOver()) echo 'disabled'?>>

            <input id="send_form" type="submit" value="modifier">
        </form>
    </div>