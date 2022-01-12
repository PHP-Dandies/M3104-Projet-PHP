<?php
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include substr($doc_root, 0, -6).'/Utils/AutoLoader.php';
start_page("test");
navbar();
/** @var TYPE_NAME $data */
$users = $data;
?>
    <div class="container" style="margin-top: 5px">
        <h1 class="text-center"> Listes des utilisateurs </h1>
        <?php
        echo'    <table class="striped">'.PHP_EOL;
        foreach ($users as $user){
            ?>
            <tr>
                <td><?php echo $user["USER_ID"] ?></td>
                <td><?php echo $user["USERNAME"]?></td>
                <td><?php echo $user["PASSWORD"]?></td>
                <td><?php echo $user["ROLE"]?></td>
                <td><a href="<?php echo '/users/modify/' . $user['USER_ID']?>" class="button error">Modifier</a></td>
            </tr>
        <?php
        }
        echo'    </table>'.PHP_EOL;
end_page();
?>