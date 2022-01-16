<?php
start_page("test");
navbar();
returnButton('.');
/** @var array $data */
$users = $data['users'];
for ($i = 0, $max = count($users); $i < $max; ++$i) {
    $users[$i] = UserModel::constructFromArray($users[$i]);
}
if (isset($data['errors'])) {
    displayErrors($data['errors']);
}
$emails = $data['emails'];
var_dump($emails);
die();
/** @var UserModel $user */
?>
    <div class="container" style="margin-top: 5px">
        <h1 class="text-center"> Listes des utilisateurs </h1>
        <div class="striped">
            <?php foreach ($users as $user) { ?>
                <form method="post" action="?controller=Admin&action=editUser">
                    <input type="hidden" name="userid" value="<?php echo $user->getUserID() ?>">
                    <label for="username_input">Nom d'utilisateur actuel : <?php echo $user->getUsername() ?></label>
                    <input type="text" id="username_input" name="username" value="<?php echo $user->getUsername() ?>"
                           placeholder="<?php echo $user->getUsername() ?>">
                    <label for="password_input"> Changer le mot de passe :</label>
                    <input type="text" id="password_input" name="password">
                    <label for="role-select">Role actuel : <?php echo $user->getRole() ?></label>
                    <select name="role" id="role-select" value="">
                        <option value="<?php echo $user->getRole() ?>">Choisissez une option</option>
                        <option value="admin">Admin</option>
                        <option value="organizer">Proposeur d'event</option>
                        <option value="jury">Jury</option>
                        <option value="donor">Voteur</option>
                    </select>
                    <?php if ($user->getEmail() === 'none') { ?>
                        <label for="email_select">Utilisateur non attribué</label>
                        <select name="email" id="email_select">
                            <option value="<?php echo $user->getEmail() ?>">Choissiez un email au quel attribuer cet
                                utilisateur
                            </option>
                            <?php
                            foreach ($users as $nUser) {
                                if ($nUser->getEmail() !== '') {
                                    ?>
                                    <option value="<?php echo $nUser->getEmail(); ?>"><?php echo $nUser->getEmail(); ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                        <?php
                    } else { ?>
                        <label>Email actuel : <?php echo $user->getEmail() ?></label>
                        <?php
                    } ?>
                    <input value="Modifier" type="submit" class="square">
                </form>
                <br>
            <?php } ?>
        </div>
        <a href="?controller=Admin&action=createUser" class="button error">Ajouter Utilisateur</a>
    </div>
<?php
end_page();
?>