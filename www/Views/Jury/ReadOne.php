<?php
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include substr($doc_root, 0, -6).'/Utils/AutoLoader.php';
start_page("test");
/** @var array $data */
if (isset($data["IDEA"])){
    $idea = $data["IDEA"];
}
if (isset($data["COMMENTS"])){
    $comments = $data["COMMENTS"];
}
if (isset($data["CONTENTS"])){
    $users = $data["CONTENTS"];
}
navbar();
if(!empty($data["IDEA"]))
{
?>
    <!--Verifier que data n'est pas vide, si il est vide boutton pasge d'acceuil sinon on continue (maelioration -> chercher les autre campagnes ene deliberation -->
<div class="container" style="margin-top: 5px">
        <div class="is-vertical-align is-horizontal-align" style="margin-top: 5px; height: 20vh; background-image: url('../Images/0.jpg'); background-position: center; background-size: cover;">
            <h1 class="text-uppercase" style="background-color: rgba(160, 160, 160, 0.64); padding: 5px; color: white"><?php echo $idea["IDEA"]["TITLE"] ?></h1>
        </div>

     <div>
            <div class="row" style="margin-top: 5px">
                <div class="col-8">
                    <p>mettre image ici</p>
                    <?php echo $idea["IDEA"]["DESCRIPTION"] ?>
                </div>
                <div class="col-4">
                    <div class="card">
                        <h3>Organisateur : <?php echo $data["USERNAME"] ?></h3>
                        <progress value="<?php echo $idea["IDEA"]["TOTAL_POINTS"] ?>" max="<?php echo $idea["IDEA"]["GOAL"] ?>"></progress>
                        <p><?php echo $idea["IDEA"]["TOTAL_POINTS"] ?> sur <?php echo $idea["IDEA"]["GOAL"]?> pts</p>
                    </div>

                    <div class="card" style="margin-top: 5px">
<!--                        --><?php //if($idea["REALIZED"]==0){?>
                        <form action="?controller=Jury&action=juryVote&param=<?php echo $idea["IDEA"]["IDEA_ID"];?>&campaignID=<?php echo $idea["IDEA"]["CAMPAIGN_ID"] ?>" method="post">
                            <input type="hidden" name="campaignID" value="<?php echo $idea["IDEA"]["CAMPAIGN_ID"] ?>">
                            <input type="submit" value="Vote">
                        </form>
<!--                        --><?php //} else {?>
                        <div>
                            <p>Vous avez déjà voté pour cette idée</p>
                        </div>
<!--                        --><?php //}?>
                    </div>

                    <?php
                    if (isset($data["CONTENTS"])) {
                        foreach($data["CONTENTS"] as $content) {
                            ?>
                            <div class="card" style="margin-top: 5px">
                                <h4> <?php echo $content["TITLE"] ?> </h4>
                                <code> <?php if ($content["POINTS"] < $idea["IDEA"]["TOTAL_POINTS"]) echo 'Atteint'; else echo $content["POINTS"]; ?> </code>
                                <p><?php echo $content["DESCRIPTION"] ?></p>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="is_vertical_align" style="margin-top: 5px">
                <h1 class="text-uppercase" style="background-color: rgba(160, 160, 160, 0.64); padding: 5px; color: white">Commentaires</h1>
                <?php
                foreach ($comments as $comment) { ?>
                    <div class="is_vertical_align">
                        <p><?php echo $comment["USERNAME"]?></p>
                        <p><?php echo $comment["comment"]?></p>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
<?php
}
else{?>
    <form action="?"><!--        //redirection vers la page d'accueil-->
        <div>
            <p>Impossible d'aller plus loin, veuillez retourner à la page d'accueil</p>
            <button type="button">Page d'accueil</button>
        </div>
    </form>
    <?php
}
end_page();
?>