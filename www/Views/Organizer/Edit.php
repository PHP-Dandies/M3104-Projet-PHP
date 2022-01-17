<?php
start_page("OrgaView");
navbar();
/** @var array $data */
$idea = $data['idea'];
$content = $data['content'];
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
        <input type="submit" value="Enregistrer" style="margin-top: 5px">
    </form>
    <table>
        <thead>
        <tr>
            <td>Nom du But</td>
            <td>Description</td>
            <td>Valeur du But</td>
            <td>Supprimer</td>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($content as $CONTENT) {
            ?>
            <tr>
                <td><?php echo $CONTENT['TITLE'] ?></td>
                <td><?php echo $CONTENT['DESCRIPTION'] ?></td>
                <td><?php echo $CONTENT['POINTS'] ?></td>
                <td>
                    <form action="/organisateur/modifier/<?php echo $idea["IDEA_ID"] ?>?controller=Organizer&action=deleteContent" method="post">
                        <input type="hidden" name="iid" value="<?php echo $idea['IDEA_ID'] ?>">
                        <input type="hidden" name="title" value="<?php echo $CONTENT['TITLE'] ?>">
                        <input type="submit" value="Supprimmer">
                    </form>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <form action="/organisateur/modifier/<?php echo $idea["IDEA_ID"] ?>?controller=Organizer&action=addContent" method="post">
        <div class="card" style="margin-top: 20px">
            <h3>Ajouter un but.</h3>
            <input type="hidden" name="iid" value="<?php echo $idea['IDEA_ID'] ?>" required>
            <label for="title">Titre</label>
            <input type="text" id="title" name="title" required>
            <label for="description">Description</label>
            <textarea id="description" name="description" required></textarea>
            <label for="goal">But</label>
            <input id="goal" type="number" name="goal" required>
            <input type="submit" name="Ajouter" style="margin-top: 5px">
        </div>
    </form>
</div>
<?php
end_page();
?>
