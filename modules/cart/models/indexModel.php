<?php
function add_cart($product_id,$user_id,$quantity){
    if(empty($quantity))
    {
        $sql = "INSERT INTO carts(user_id,product_id,quantity) VALUES ({$user_id},{$product_id},1)";
        db_query($sql);
    }
    else
    {
        $quantity = $quantity +1;
        $sql = "UPDATE carts set quantity = {$quantity} WHERE product_id = {$product_id} and user_id = {$user_id}";
        db_query($sql);
    }
}
function update_cart($product_id,$user_id,$quantity){
    $sql = "UPDATE carts set quantity = {$quantity} WHERE product_id = {$product_id} and user_id = {$user_id}";
    db_query($sql);
}
function get_quantity($product_id, $user_id){
    $result = db_get_row("SELECT quantity from carts where product_id = {$product_id} and user_id = {$user_id}");
    return $result['quantity'];
}
function get_list_item_cart($user_id){
    $sql = "SELECT product_id,thump_link,product_name,selling_price,quantity,(selling_price * quantity) as sub_total, product_id from carts
    join products using(product_id) where user_id = {$user_id} ";
    $result = db_fetch_array($sql);
    return $result;
}
function del_cart_by_id($user_id,$product_id){
    $sql = "DELETE from carts where product_id = {$product_id} and user_id = {$user_id}";
    db_query($sql);
}
function delALl_cart_by_id($user_id){
    $sql = "DELETE from carts where user_id = {$user_id}";
    db_query($sql);
}
function getSumPurchasedPrice($user_id){
    $sql = "SELECT sum(purchased_price*quantity) from carts inner join products using (product_id) where user_id = {$user_id}";
    $result = db_get_row($sql);
    return $result['sum'];
}