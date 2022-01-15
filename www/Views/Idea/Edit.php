<?php
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include_once $doc_root.'/../Utils/HelperUtils.php';
start_page("OrgaView");
navbar();
/** @var array $data */
$idea = $data['IDEA'];
?>
    <div class="container" style="margin-top: 5px">
        <form enctype="multipart/form-data" action="/?controller=Idea&action=editIdea" method="post">
            <input name="id" type="hidden" value="<?php echo $idea["IDEA_ID"] ?>" required>
            <table class="striped">
                <caption>Modifier mon idée.</caption>
                <thead>
                    <tr>
                        <th>Champ</th>
                        <th>Valeur du champ</th>
                    </tr>
                </thead>
                    <tr>
                        <td><label for="title">Titre</label></td>
                        <td><input type="text" name="title" value="<?php echo $idea["TITLE"] ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="description">Description</label></td>
                        <td><textarea name="description" required><?php echo $idea["DESCRIPTION"] ?></textarea></td>
                    </tr>
                    <tr>
                        <td><label for="goal">Goal</label></td>
                        <td><input type="number" name="goal" value="<?php echo $idea["GOAL"] ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="image">Picture</label></td>
                        <td>
                            <img src="<?php echo $idea["PICTURE"] ?>" style="max-height: 30vh; max-width: 50vw;">
                            <input type="file" name="image" accept="image/*">
                        </td>
                    </tr>
                </table>
            <input type="submit" value="Enregistrer">
            </form>
    </div>
<?php
end_page();
?>