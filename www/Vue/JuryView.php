<?php
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include $doc_root.'/HelperUtils.php';
start_page("test");
navbar();
?>
    <div class="container" style="margin-top: 5px">
        <h2>Campagne XXX</h2>
        <table class="striped" style="margin-top: 10px">
            <tr>
                <td>Albert</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
<?php
end_page();
?>