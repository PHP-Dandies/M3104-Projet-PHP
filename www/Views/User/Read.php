<?php
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include substr($doc_root, 0, -6) . '/Utils/AutoLoader.php';
start_page("test");
navbar();
/** @var TYPE_NAME $data */
$users = $data;
?>
<section>
    <div class="box">
        <!-- Nom actuel -->
        <h1 class="text-center"> Listes des utilisateurs </h1>
            <?php foreach ($users as $user) { ?>    <form method="post" action="../../Scripts/EditUser.php?id=<?php echo $user['USER_ID'];?>">
                <div>
                    <table>
                        <caption>Liste des utilisateurs</caption> <!-- Titre -->

                        <thead> <!-- En-tête du tableau -->
                            <tr class="text">
                                <th><label for="username_input">Nom d'utilisateur actuel : <?php echo $user["USERNAME"] ?></label></th>
                                <th><label for="password_input">Mot de passe actuel : <?php echo $user["PASSWORD"] ?></label></th>
                                <th><label for="role-input">Role actuel : <?php echo $user["ROLE"] ?></label></th>
                                <?php if ($user['EMAIL'] === ''){ ?>
                                <th><label for="email_select">Utilisateur non attribué</label></th>
                            </tr>
                        </thead>

                        <tbody> <!-- Corps du tableau -->
                            <tr>
                                <th><input type="text" id="username_input" name="username" placeholder="<?php echo $user["USERNAME"] ?>"></th>
                                <th><input type="text" id="password_input" name="password" placeholder="<?php echo $user["PASSWORD"] ?>"></th>
                                <th>
                                    <label class="custom-selector">
                                        <select name="role">
                                            <option value="">Choisissez une option</option>
                                            <option value="admin">Admin</option>
                                            <option value="event">Propeuseur d'event</option>
                                            <option value="jury">Jury</option>
                                            <option value="voter">Voteur</option>
                                        </select>
                                    </label>
                                </th>
                                <th>
                                    <select name="email" id="email_select">
                                        <option value="">Choisissez l'email</option>
                                        <?php
                                            foreach ($users as $nUser){
                                                if ($nUser['EMAIL'] !== ''){ ?>
                                                <option value="<?php echo $nUser['EMAIL']; ?>"><?php echo $nUser['EMAIL']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </th>
                            </tr>
                        </tbody>

                        <tfoot> <!-- Pied du tableau -->
                            <tr>
                                <?php } else { ?>
                                <th><label>Email actuel : <?php echo $user['EMAIL'] ?></label></th>
                            </tr>
                            <?php } ?>
                        </tfoot>

                    </table>


                </div>
                <label><input value="Modifier" type="submit" class="Login"></label>
        </form>
        <?php } ?>
        <a href="../../Scripts/AddUser.php" class="button error">Ajouter Utlisateur</a>
    </div>
</section>
<?php
    end_page();
?>