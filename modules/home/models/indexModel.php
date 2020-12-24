<?php

function get_list_users() {
    $result = db_fetch_array("SELECT * FROM users");
    return $result;
}

function get_user_by_id($id) {
    $item = db_get_row("SELECT * FROM customers WHERE user_id = {$id}");
    return $item;
}

function get_cart_by_id($id){
    $result = db_fetch_array("SELECT * FROM carts WHERE user_id = {$id}");
    return $result;
}


