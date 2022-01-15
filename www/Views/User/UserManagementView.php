<?php
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include substr($doc_root, 0, -6).'/Utils/AutoLoader.php';start_page("test");
navbar();

$users = array(array('USER_ID'  => 1, 'USERNAME' => 'toto', 'PASSWORD' => 'password', 'ROLE' => 'admin', 'AVAILABLE_POINTS' => 200, 'EMAIL' => 'test@example.com'),
    array('USER_ID'  => 2, 'USERNAME' => 'tata', 'PASSWORD' => 'password', 'ROLE' => 'admin', 'AVAILABLE_POINTS' => 200, 'EMAIL' => 'test1@example.com'),
    array('USER_ID'  => 3, 'USERNAME' => 'titi', 'PASSWORD' => 'password', 'ROLE' => 'admin', 'AVAILABLE_POINTS' => 200, 'EMAIL' => 'test2@example.com'));
?>
    <div class="container" style="margin-top: 5px">
        <h2>Utilisateurs</h2>
        <div class="card">
            <form action="#" class="is-horizontal-align">
                <input type="text" placeholder="Ajouter un utilisateur">
                <input type="submit">
            </form>
        </div>
        <table class="striped" style="margin-top: 10px">
            <thead>
            <tr>
                <th>Pseudonyme</th>
                <th>Role</th>
                <th>Email</th>
                <th>Reset MDP</th>
            </tr>
            </thead>
            <tbody>
<?php
foreach ($users as $user)
{
    $roles = array('no_role'=>'Pas de role', 'admin'=>'Admin', 'organisateur'=>'Organisateur', 'jury'=>'Jury', 'donateur'=>'Donateur');
    echo '            <tr>'.PHP_EOL;
    echo '                <td>'.$user["USERNAME"].'</td>'.PHP_EOL;
    echo '                <td>'.PHP_EOL;
    echo '                    <form action="#" class="is-horizontal-align">'.PHP_EOL;
    echo '                        <select name="role" id="role-select">'.PHP_EOL;
    echo '                            <option value="'.$user["ROLE"].'" selected>'.$roles[$user["ROLE"]].'</option>'.PHP_EOL;
    unset($roles[$user["ROLE"]]);
    foreach ($roles as $role => $role_name)
    {
        echo '                            <option value="'.$role.'">'.$role_name.'</option>'.PHP_EOL;
    }
    echo '                        </select>'.PHP_EOL;
    echo '                        <input type="submit" value="Save">'.PHP_EOL;
    echo '                    </form>'.PHP_EOL;
    echo '                </td>'.PHP_EOL;
    echo '                <td>'.$user["EMAIL"].'</td>'.PHP_EOL;
    echo '                <td>'.PHP_EOL;
    echo '                    <form action="#">'.PHP_EOL;
    echo '                        <input class="button error" type="submit" value="Reset Password">'.PHP_EOL;
    echo '                    </form>'.PHP_EOL;
    echo '                </td>'.PHP_EOL;
    echo '            </tr>'.PHP_EOL;

}
?>
            </tbody>
        </table>
    </div>
<?php
end_page();
?>