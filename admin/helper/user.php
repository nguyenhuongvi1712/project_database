<?php
function get_infor_admin(){
    $data = db_get_row("SELECT  *FROM users where email='{$_SESSION['user']['email']}'");
    return $data;
}
