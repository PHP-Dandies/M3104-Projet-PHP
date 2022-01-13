<?php
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include '../../Utils/HelperUtils.php';
start_page("test");
navbar();
/** @var TYPE_NAME $data */
//$user = $data[0];
$user = array();
$user["USER_ID"] = 1;
$user["USERNAME"] = 'cacaca';
$user["PASSWORD"] = 'password';
$user["ROLE"] = 'voteur';
?>
    <section>
        <div class="box">
            <!-- les carré qui bouge -->
            <div class="square" style="--i:0;"></div>
            <div class="square" style="--i:1;"></div>
            <div class="square" style="--i:2;"></div>
            <div class="square" style="--i:3;"></div>
            <div class="square" style="--i:4;"></div>

            <div class="inputBox">
                <h2> Utilisateur : </h2>
                <tr>
                    <td><?php echo $user["USER_ID"] ?></td>
                    <td><?php echo $user["USERNAME"]?></td>
                    <td><?php echo $user["PASSWORD"]?></td>
                    <td><?php echo $user["ROLE"]?></td>
                </tr>

            </div>

            <div class="container2">
                <form action="../../Scripts/EditUser.php?id=<?php echo $user["USER_ID"]?>" method="post">
                    <h2> Modifier : </h2>

                    <div class="group">
                            <input name="username" type="text" placeholder="Nouveau nom d'utilisateur">
                    </div>

                    <div class="group">
                        <label>
                            <input name="password" type="password" placeholder="Nouveau mot de passe">
                        </label>
                    </div>

                    <select name="role" id="pet-select">
                        <option value="">Choisissez une option</option>
                        <option value="admin">Admin</option>
                        <option value="event">Proposeur d'event</option>
                        <option value="jury">Jury</option>
                        <option value="voter">Voteur</option>
                    </select><br>

                    <div class="inputBox">
                        <input type="submit" class="Login">
                    </div>

                </form>
            </div>
        </div>
    </section>
<?php
end_page();
?>