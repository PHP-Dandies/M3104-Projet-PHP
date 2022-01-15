<?php
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include substr($doc_root, 0, -6).'/Utils/AutoLoader.php';
start_page("test");
/** @var array $data */
$idea = $data["IDEA"];
if (isset($data["COMMENTS"])) {
    $comments = $data["COMMENTS"];
}
if (isset($data["CONTENTS"])) {
    $users = $data["CONTENTS"];
}
navbar();
?>
    <div class="container" style="margin-top: 5px">
        <div class="is-vertical-align is-horizontal-align" style="margin-top: 5px; height: 20vh; background-image: url('<?php echo $idea["PICTURE"] ?>'); background-position: center; background-size: cover;">
            <h1 class="text-uppercase" style="background-color: rgba(160, 160, 160, 0.64); padding: 5px; color: white"><?php echo $idea["TITLE"] ?></h1>
        </div>
        <div>
            <div class="row" style="margin-top: 5px">
                <div class="col-8">
                    <?php echo $idea["DESCRIPTION"] ?>
                </div>
                <div class="col-4">
                    <div class="card">
                        <h3>Organisateur : <?php echo $data["USER"]["USERNAME"] ?></h3>
                        <progress value="<?php echo $idea["TOTAL_POINTS"] ?>" max="<?php echo $idea["GOAL"] ?>"></progress>
                        <p><?php echo $idea["TOTAL_POINTS"] ?> sur <?php echo $idea["GOAL"]?> pts</p>
                    </div>
                    <?php if ($_SESSION['role'] === 'DONATEUR'){ ?>
                    <div class="card" style="margin-top: 5px">
                        <form action="../../Scripts/UserVote.php?id=<?php echo $idea["IDEA_ID"] ?>" method="post">
                            <label>
                                <input name="pts" type="number">
                            </label>
                            <input type="submit" value="Donner">
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
        <?php if ($_SESSION['role'] === 'DONATEUR'){ ?>
            <div class="is_vertical_align" style="margin-top: 5px">
                <h1 class="text-uppercase" style="background-color: rgba(160, 160, 160, 0.64); padding: 5px; color: white">Commentaires</h1>
                <form action="?controller=Public&action=addComment" method="post">
                    <label>
                        <input name="comment" placeholder="Laissez un commentaire">
                    </label>
                    <input type="submit" class="square">
                </form>
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
    <?php } ?>
        </div>
    </div>
<?php
end_page();
?>