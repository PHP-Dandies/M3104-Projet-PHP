<?php
/** @var array $data */
$campaign = $data[0];
var_dump($campaign);
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include substr($doc_root, 0, -6).'/Utils/AutoLoader.php';
start_page("test");
navbar();
/** @var AdminController $controller */
$campaign = CampaignModel::constructFromArray($campaign);
var_dump($campaign);
die();
?>
    <div>
        <form>
            <label for="title"> Titre actuel : <?php echo $campaign["TITLE"];?></label>
            <input id="title" type="text" name="title" placeholder="<?php echo $campaign["TITLE"];?>">

            <label for="beg_date"> Changer la date de début : </label>
            <input type="date" id="beg_date" name="beg_date"
                   value="<?php echo $campaign["BEG_DATE"] ?>" min="<?php echo date('Y-m-d') ?>">

            <label for="end_date"> Changer la date de fin : </label>
            <input type="date" id="end_date" name="end_date"
                   value="<?php echo $campaign["END_DATE"] ?>" min="<?php echo date('Y-m-d') ?>">

            <label for="delib_date"> Changer la date de fin de délibération : </label>
            <input type="date" id="delib_date" name="delib_date"
                   value="<?php echo $campaign["DELIB_END"] ?>">

            <input id="send_form" type="submit" value="modifier">
        </form>
    </div>