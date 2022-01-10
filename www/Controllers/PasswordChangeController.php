<?php
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include '../Views/User/PasswordChangeView.php';

//

class PasswordChangeController extends Controller {

}



