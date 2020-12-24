<?php

session_start();
function set_session($key,$val){
    $_SESSION[$key] = $val;
}
function get_session($key){
    return isset($_SESSION[$key])?$_SESSION[$key]:false;
}
function del_session($key){
   if(isset($_SESSION[$key])) unset($_SESSION[$key]);
}