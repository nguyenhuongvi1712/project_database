<?php
function get_list_order(){
    $user_id = get_customer_id_by_email();
    $result = db_fetch_array("SELECT *from invoices where user_id={$user_id} order by invoice_id desc");
    return $result;
}
function get_list_detail_order_by_id($invoice_id){
    $result = db_fetch_array("SELECT product_id,quantity,p.selling_price,thump_link,product_name from payments as p inner join products using(product_id) WHERE invoice_id = {$invoice_id}");
    return $result;
}
function get_if_order_by_id($id){
    $result = db_get_row("SELECT *from invoices where invoice_id = {$id}");
    return $result;
}