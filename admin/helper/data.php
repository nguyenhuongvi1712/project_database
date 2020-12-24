<?php

function show_array($data) {
    if (is_array($data)) {
        echo "<pre>";
        print_r($data);
        echo "<pre>";
    }
}
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

function add_to_product($product_id,$type,$selling_price,$purchased_price,$thump_link,$product_name,$description){
    $sql = "INSERT INTO products values($product_id,$type,$selling_price,$purchased_price,'{$thump_link}','{$product_name}','{$description}')";
    db_query($sql);
}
function add_to_smartphone($product_id,$screen,$battery_capacity,$rear_camera,$front_camera,$sim,$ram,$rom,$hdh,$cpu){
    $sql = "INSERT INTO smart_phone values($product_id,'{$screen}','{$battery_capacity}','{$rear_camera}','{$front_camera}','{$sim}','{$ram}','{$rom}','{$hdh}','{$cpu}')";
    db_query($sql);
}
function add_to_laptop($product_id,$cpu,$ram,$hard_drive,$screen,$graphic_card,$connector,$operating_system,$design,$size,$time_of_launch){
    $sql = "INSERT INTO laptop values($product_id,'{$cpu}','{$ram}','{$hard_drive}','{$screen}','{$graphic_card}','{$connector}','{$operating_system}','{$design}','{$size}','{$time_of_launch}')";
    db_query($sql);
}
function add_to_tablet($product_id,$screen,$battery_capacity,$rear_camera,$front_camera,$damthoai,$ram,$rom,$hdh,$cpu,$weight){
    $sql = "INSERT INTO smart_phone values($product_id,'{$screen}','{$battery_capacity}','{$rear_camera}','{$front_camera}','{$damthoai}','{$ram}','{$rom}','{$hdh}','{$cpu}','{$weight}')";
    db_query($sql);
}
function check_product_id($id){
    $result = db_get_row("SELECT *FROM products where product_id = {$id}");
    if(!empty($result)) return true;
    return false;
}
function get_list_product($order_by = "",$type = "",$type_cate="",$manipulation_type='create',$status=1){
    $sql = "SELECT products.*,manipulations.*, username from products inner join manipulations using(product_id) inner join users using(user_id) ";
    if($order_by!="") $sql = $sql."order_by = {$order_by}";
    if($type!="") $sql = $sql."{$type}";
    if($type_cate!="") $sql = $sql." where products.type = {$type_cate} and status = {$status}";
    else $sql = $sql." where status = {$status} and manipulation_type='{$manipulation_type}'";
    $result = db_fetch_array($sql);
    return $result;  
}
function getTrashCount(){
    $count = db_get_row("SELECT count(*) from products where status = 0");
    return $count['count'];
}
function getProductCount(){
    $count = db_get_row("SELECT count(*) from products where status = 1");
    return $count['count'];
}
function addToManipulation($user_id,$product_id,$type){
    $sql = "INSERT INTO manipulations values({$user_id},{$product_id},'{$type}',now())";
    db_query("$sql");
}