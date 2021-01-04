<?php
function getInforProduct($id,$type){
    if($type == 1){
        $data = db_get_row("SELECT *FROM smart_phone inner join (SELECT *FROM products where product_id = {$id}) as p using(product_id)");
    }
    else if($type ==2){
        $data = db_get_row("SELECT *FROM laptop inner join (SELECT *FROM products where product_id = {$id}) as p using(product_id)");
    }
    else if($type == 3){
        $data = db_get_row("SELECT *FROM tablet inner join (SELECT *FROM products where product_id = {$id}) as p using(product_id)");
    }
    return $data;
}
function getInforUpdate($productId){
    $data = db_get_row("SELECT username,manipulation_date from manipulations inner join users using(user_id) where product_id = {$productId} and manipulation_type = 'update'");
    return $data;
}