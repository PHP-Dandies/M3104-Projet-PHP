<?php
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include substr($doc_root, 0, -6).'/Utils/AutoLoader.php';
start_page("test");

/** @var array $data */
$idea = ($data['idea']['IDEA']);
if (isset($data['idea']["COMMENTS"])) {
    $comments = $data['idea']["COMMENTS"];
}
if (isset($data['idea']["CONTENTS"])) {
    $users = $data['idea']["CONTENTS"];
}
if (isset($data['errors'])) {
    $errors = $data['errors'];
}
navbar();?>

    <div class="container" style="margin-top: 5px">
        <div class="is-vertical-align is-horizontal-align" style="margin-top: 5px; height: 20vh; background-image: url('../Images/0.jpg'); background-position: center; background-size: cover;">
            <h1 class="text-uppercase" style="background-color: rgba(160, 160, 160, 0.64); padding: 5px; color: white"><?php echo $idea["TITLE"]?> </h1>
        </div>

        <div>
            <div class="row" style="margin-top: 5px">
                <div class="col-8">
                    <p>mettre image ici</p>
                    <?php echo $idea["DESCRIPTION"] ?>
                </div>
                <div class="col-4">
                    <div class="card">
                        <h3>Organisateur : <?php echo $data['idea']["USER"]["USERNAME"] ?></h3>
                        <progress value="<?php echo $idea["TOTAL_POINTS"] ?>" max="<?php echo $idea["GOAL"] ?>"></progress>
                        <p><?php echo $idea["TOTAL_POINTS"] ?> sur <?php echo $idea["GOAL"]?> pts</p>
                    </div>
                    <?php if (isset ($_SESSION['role']) and $_SESSION['role'] === DONOR){ ?>
                    <div class="card" style="margin-top: 5px">
                        <form action="?controller=Donator&action=userVote" method="post">
                            <label>
                                <input type="hidden" name="ideaID" value="<?php echo $idea["IDEA_ID"] ?>">
                            </label>
                            <label>
                                <input min="0"  name="pts" type="number">
                            </label>
                            <input type="submit" value="Donner">
                            <?php
                             if (isset($errors['notEnough'])) { ?>
                                 <div>
                                     <p><?php echo $errors ['notEnough'] ?></p>
                                 <?php }
                                 if (isset($errors['toomuchpoints'])) { ?>
                                     <p><?php echo $errors ['toomuchpoints'] ?></p>
                                </div>
                            <?php } ?>
                        </form>
                    </div>
                    <?php }
                    if (isset($data["CONTENTS"])) {
                        foreach($data["CONTENTS"] as $content) {
                            ?>
                            <div class="card" style="margin-top: 5px">
                                <h4> <?php echo $content["TITLE"] ?> </h4>
                                <code> <?php if ($content["POINTS"] < $idea["TOTAL_POINTS"]) echo 'Atteint'; else echo $content["POINTS"]; ?> </code>
                                <p><?php echo $content["DESCRIPTION"] ?></p>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <br>
            <br>
            <?php if (isset ($_SESSION['role']) and $_SESSION['role'] === DONOR){ ?>
            <div class="is_vertical_align" style="margin-top: 5px">
                <h1 class="text-uppercase" style="background-color: rgba(160, 160, 160, 0.64); padding: 5px; color: white">Commentaires</h1>
                <?php
                if (isset($errors['noComment'])) { ?>
                    <div>
                        <p><?php echo $errors['noComment'] ?></p>
                    </div>
                <?php } ?>
                <form action="?controller=Donator&action=userComment" method="post">
                    <label>
                        <input type="hidden" name="ideaID" value="<?php echo $idea["IDEA_ID"] ?>">
                    </label>
                    <label>
                        <input maxlength="250" name="comment" placeholder="Laissez un commentaire">
                    </label>
                    <input type="submit" class="square">
                </form>
                <?php
                foreach ($comments as $comment) { ?>
                    <div class="card">
                        <p><h4 class = "text_success">Commentaire de <?php echo $_SESSION['user']?></h4></p>
                        <p><?php echo $comment["comment"]?></p>
                        <br>
                    </div>
                    <?php
                }
                ?>
            </div>
    <?php } ?>
        </div>
    </div>
<?php
end_page();
?>