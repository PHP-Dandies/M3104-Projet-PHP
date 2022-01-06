<?php
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include $doc_root.'/HelperUtils.php';
start_page("test");
navbar();
?>
    <div class="container" style="margin-top: 5px">
    <div class="test"></div>
    </div>
<?php
end_page();
?>