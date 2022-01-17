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
/** @var UserModel $user */
?>
    <div class="container" style="margin-top: 5px">
        <h1 class="text-center"> Listes des utilisateurs </h1>
            <div class="striped">
                <?php foreach ($users as $user) { ?><br>
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
                        <option value="<?PHP echo ADMIN ?>"><?PHP echo ADMIN ?></option>
                        <option value="<?PHP echo JURY ?>"><?PHP echo ADMIN ?></option>
                        <option value="<?PHP echo DONOR ?>"><?PHP echo ADMIN ?></option>
                        <option value="<?PHP echo ORGANIZER ?>"><?PHP echo ORGANIZER ?></option>
                        <option value="<?PHP echo _PUBLIC ?>"><?PHP echo _PUBLIC ?></option>
                    </select>
                    <?php if ($user->getEmail() === 'none') { ?><br>
                    <label for="email_select">Utilisateur non attribué</label>
                    <select name="email" id="email_select">
                        <option value="<?php echo $user->getEmail() ?>">Choissiez un email au quel attribuer cet utilisateur</option>
                        <?php
                        foreach ($emails as $email) {
                        if ($email !== '') {
                        ?>
                        <option value="<?php echo $email; ?>"><?php echo $email; ?></option>
                        <?php
                        }
                        }
                        ?>
                    </select>
                    <?php } else { ?>
                        <label>Email actuel : <?php echo $user->getEmail() ?></label>
                    <?php
                    } ?>
                        <input value="Modifier" type="submit" class="square">
                </form>
                <?php } ?>
        </div>
        <a href="?controller=Admin&action=createUser" class="button error">Ajouter Utilisateur</a>
    </div>
<?php
end_page();
?>