<?php
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include $doc_root.'/HelperUtils.php';
start_page("test");
navbar();
?>
    <div class="container" style="margin-top: 5px">
        <h2>Utilisateurs</h2>
        <table class="striped">
            <thead>
            <tr>
                <th>Pseudonyme</th>
                <th>Role</th>
                <th>???</th>
                <th>Reset MDP</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Albert</td>
                <td>Table Cell 2</td>
            </tr>
            <tr>
                <td>Table Cell 1</td>
                <td>Table Cell 2</td>
                <td>Table Cell 3</td>
                <td>Table Cell 4</td>
            </tr>
            </tbody>
        </table>
    </div>
<?php
end_page();
?>