<?php
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include substr($doc_root, 0, -6) . '/Utils/AutoLoader.php';
start_page("test");
navbar();
/** @var array $data */
$users = $data;
?>
    <div class="container" style="margin-top: 5px">
        <h1 class="text-center"> Listes des utilisateurs </h1>
        <div class="striped">
        <?php foreach ($users as $user) { ?>
            <form method="post" action="../../Scripts/EditUser.php?id=<?php echo $user['USER_ID'];?>">
                <label for="username_input">Nom d'utilisateur actuel : <?php echo $user["USERNAME"] ?></label>
                <input type="text" id="username_input" name="username" placeholder="<?php echo $user["USERNAME"] ?>">
                <label for="password_input">Mot de passe actuel : <?php echo $user["PASSWORD"] ?></label>
                <input type="text" id="password_input" name="password" placeholder="<?php echo $user["PASSWORD"] ?>">
                <label for="role-select">Role actuel : <?php echo $user["ROLE"] ?></label>
                <select name="role" id="role-select">
                    <option value="">Choisissez une option</option>
                    <option value="admin">Admin</option>
                    <option value="event">Proposeur d'event</option>
                    <option value="jury">Jury</option>
                    <option value="voter">Voteur</option>
                </select>
                <?php if ($user['EMAIL'] === '') { ?>
                <label for="email_select">Utilisateur non attribué</label>
                <select name="email" id="email_select">
                    <option value="">Choissiez un email au quel attribuer cet utilisateur</option>
                    <?php
                    foreach ($users as $nUser) {
                        if ($nUser['EMAIL'] !== '') {
                            ?>
                    <option value="<?php echo $nUser['EMAIL']; ?>"><?php echo $nUser['EMAIL']; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
                    <?php
                } else { ?>
                <label>Email actuel : <?php echo $user['EMAIL'] ?></label>
                <?php
                }?>
                <input value="Modifier" type="submit" class="square">
            </form>
            <br>
        <?php } ?>
         </div>
        <a href="../../Scripts/AddUser.php" class="button error">Ajouter Utilisateur</a>
    </div>
<?php
end_page();
?>