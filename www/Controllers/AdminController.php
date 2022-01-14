<?php

require_once('../Utils/AutoLoader.php');
class AdminController
{
    /**
     * @throws Exception
     */
    public function read() : void{
        ViewHelper::display(
            $this,
            'AdminView',
        );
    }
}