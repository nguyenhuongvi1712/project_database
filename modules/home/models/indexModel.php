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
function getListSearch($keyWord){
    $pattern = "/[0-9]/";
    $keyWordLower = strtolower($keyWord);
    if (preg_match($pattern, $keyWord))
        $sql = "SELECT product_name , product_id from products where (lower(product_name) like '%{$keyWordLower}%' or product_id = {$keyWord}) and status = 1 limit 10";
    else
        $sql = "SELECT product_name , product_id from products where lower(product_name) like '%{$keyWordLower}%' and status = 1 limit 10";
    return db_fetch_array($sql);
}
function getBestSellers(){
    return db_fetch_array("SELECT products.*,sub.sum from products inner join  
    (select sum(quantity),product_id from payments where invoice_id in(select invoice_id from invoices where status =2) group by product_id order by sum desc limit 10) as sub using (product_id) where status = 1 order by sub.sum desc limit 10");
}


