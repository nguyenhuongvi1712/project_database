<?php
function get_infor_admin(){
    $data = db_get_row("SELECT  *FROM users where email='{$_SESSION['user']['email']}'");
    return $data;
}
function getIdAdmin(){
    $data = db_get_row("SELECT user_id from users where email='{$_SESSION['user']['email']}'");
    return $data['user_id'];
}