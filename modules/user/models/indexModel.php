<?php
function get_user_infor(){
    $email = get_session('user')['email'];
    $user_if = db_get_row("SELECT username,email,address,tel_number from users where email = '{$email}'");
    return $user_if;
}