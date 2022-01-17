<?php
start_page("test");

/** @var array $data */
//$status = $data["STATUS"];
$status = $data["STATUS"];
$idea = $data["IDEA"];
var_dump($idea);
if (isset($data["COMMENTS"])) {
    $comments = $data["COMMENTS"];
}
if (isset($data["CONTENTS"])) {
    $contents = $data["CONTENTS"];
}
echo 'hello';
navbar();?>
    <div class="w-2/3 sm:w-2/3 md:w-2/3 lg:w-2/3 xl:w-2/3 mx-auto">
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300"><?php echo $idea["TITLE"]?> </h4>
            <?php if ($status === 'deliberation') { ?>
            <p class="text-gray-600 dark:text-gray-400">Cette idée est couramment en délibération</p>
            <?php } else if ($status === 'over') { ?>
            <p class="text-gray-600 dark:text-gray-400">Cette idée appartient à une campagne terminée</p>
            <?php } ?>
        </div>

        <div class="mx-10 pt-15">
            <div class="grid gap-6 mb-8 md:grid-cols-2">
                <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <p class="text-gray-600 dark:text-gray-400">Mettre image ici</p>
                    <?php echo $idea["DESCRIPTION"] ?>
                </div>
                <div class="col-4">
                    <div class="card">
                        <h3>Organisateur : <?php echo $data["USER"]["USERNAME"] ?></h3>
                        <p><?php echo $idea["TOTAL_POINTS"] ?>  pts</p>
                    </div>
                    <?php if ((isset ($_SESSION['role']) && $_SESSION['role'] === DONOR && $status === 'running')) { ?>
                        <div class="card" style="margin-top: 5px">
                            <form action="?controller=Donator&action=userVote" method="post">
                                <label>
                                    <input type="hidden" name="ideaID" value="<?php echo $idea["IDEA_ID"] ?>">
                                </label>
                                <label>
                                    <input min="0"  name="pts" type="number">
                                </label>
                                <input type="submit" value="Donner">
                            </form>
                        </div>
                    <?php }
                    if (isset($contents)) {
                        foreach($contents as $content) {
                            ?>
                            <div class="card" style="margin-top: 5px">
                                <h4> <?php echo $content["TITLE"] ?> </h4>
                                <code> <?php if ($content["POINTS"] < $idea["TOTAL_POINTS"]) echo 'Atteint'; else echo $content["POINTS"]; ?> </code>
                                <progress value="<?php echo $idea["TOTAL_POINTS"] ?>" max="<?php echo $content["POINTS"] ?>"></progress>
                                <p><?php echo $content["DESCRIPTION"] ?></p>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
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