<?php
function get_user_infor(){
    $email = get_session('user')['email'];
    $user_if = db_get_row("SELECT username,email,address,tel_number from users where email = '{$email}'");
    return $user_if;
}
function getTypeOfUser($email){
    return db_get_row("SELECT type from users where email = '$email'")['type'];
}
function getIdOfUser($email){
    return db_get_row("SELECT user_id from users where email = '$email'")['user_id'];
}