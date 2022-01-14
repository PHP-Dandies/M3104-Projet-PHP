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
        <h1 class="proof"> Listes des utilisateurs </h1>
            <?php foreach ($users as $user) { ?>    <form method="post" action="../../Scripts/EditUser.php?id=<?php echo $user['USER_ID'];?>">
                <div class="te">
                    <table>

                        <thead> <!-- En-tête du tableau -->
                            <tr class="row100-head">
                                <th class="cell100 column1"><label for="username_input">Nom d'utilisateur actuel : <?php echo $user["USERNAME"] ?></label></th>
                                <th class="cell100 column2"><label for="password_input">Mot de passe actuel : <?php echo $user["PASSWORD"] ?></label></th>
                                <th class="cell100 column3"><label for="role-input">Role actuel : <?php echo $user["ROLE"] ?></label></th>
                                <?php if ($user['EMAIL'] === ''){
                                    $email = 'non attribué';
                                }
                                else {
                                    $email = $user['EMAIL'];
                                }?>
                                <th class="cell100 column4"><label for="email_select" >Email : <?php echo $email ?></label></th>
                            </tr>
                        </thead>

                        <tbody> <!-- Corps du tableau -->
                            <tr class="row100 body">
                                <td class="cell100-row1"><input type="text" id="username_input" name="username" placeholder="<?php echo $user["USERNAME"] ?>"></td>
                                <td class="cell100-row1"><input type="text" id="password_input" name="password" placeholder="<?php echo $user["PASSWORD"] ?>"></td>
                                <td>
                                    <label class="custom-selector">
                                        <select name="role">
                                            <option value="">Choisissez une option</option>
                                            <option value="admin">Admin</option>
                                            <option value="event">Propeuseur d'event</option>
                                            <option value="jury">Jury</option>
                                            <option value="voter">Voteur</option>
                                        </select>
                                    </label>
                                </td>
                                <th class="rea">
                                    <label class="custom-selector">
                                        <select name="email" id="email_select">
                                            <option value="">Choisissez l'email</option>
                                            <?php
                                            if ($user['EMAIL'] === '') {
                                                foreach ($users as $nUser){
                                                    if ($nUser['EMAIL'] !== ''){ ?>
                                                    <option value="<?php echo $nUser['EMAIL']; ?>"><?php echo $nUser['EMAIL']; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </label>
                                </th>
                            </tr>
                        </tbody>

                        <tfoot> <!-- Pied du tableau -->
                            <?php } ?>
                        </tfoot>

                    </table>


                </div>
                <label class="te"><input value="Modifier" type="submit" class="Login"></label>
        </form>
        <?php } ?>
        <a href="../../Scripts/AddUser.php" class="button error">Ajouter Utlisateur</a>
    </div>
</section>
<?php
    end_page();
?>