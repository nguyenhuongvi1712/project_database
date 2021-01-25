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
function add_to_smartphone($product_id,$screen,$battery_capacity,$rear_camera,$front_camera,$sim,$ram,$rom,$hdh,$cpu,$brand){
    $sql = "INSERT INTO smart_phone values($product_id,'{$screen}','{$battery_capacity}','{$rear_camera}','{$front_camera}','{$sim}','{$ram}','{$rom}','{$hdh}','{$cpu}','{$brand}')";
    db_query($sql);
}
function add_to_laptop($product_id,$cpu,$ram,$hard_drive,$screen,$graphic_card,$connector,$operating_system,$design,$size,$time_of_launch,$brand){
    $sql = "INSERT INTO laptop values($product_id,'{$cpu}','{$ram}','{$hard_drive}','{$screen}','{$graphic_card}','{$connector}','{$operating_system}','{$design}','{$size}','{$time_of_launch}','{$brand}')";
    db_query($sql);
}
function add_to_tablet($product_id,$screen,$battery_capacity,$rear_camera,$front_camera,$damthoai,$ram,$rom,$hdh,$cpu,$weight,$brand){
    $sql = "INSERT INTO tablet values($product_id,'{$screen}','{$battery_capacity}','{$rear_camera}','{$front_camera}','{$damthoai}','{$ram}','{$rom}','{$hdh}','{$cpu}','{$weight}','{$brand}')";
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
    if($type_cate!="") $sql = $sql." where products.type = {$type_cate} and status = {$status} and manipulation_type='{$manipulation_type}'";
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
function checkExistsType($product_id,$manipulation_type){
    $data = db_get_row("SELECT *FROM manipulations where product_id ='".$product_id."' and manipulation_type = '".$manipulation_type."'");
    if(!empty($data)) return true;
    return false;
}
function addToManipulation($user_id,$product_id,$type){
    if(checkExistsType($product_id,$type)){
        db_query("UPDATE manipulations set user_id = {$user_id},manipulation_date = now() WHERE product_id = {$product_id} and manipulation_type ='{$type}'");
    }
    else{
        $sql = "INSERT INTO manipulations values({$user_id},{$product_id},'{$type}',now())";
        db_query("$sql");
    }
}
function getIdAdmin(){
    $data = db_get_row("SELECT user_id from users where email='{$_SESSION['user']['email']}'");
    return $data['user_id'];
}
function setSelectedInvoice($status,$select){
    if($status == $select) echo "selected='selected'";
}
function disableInvoice($status){
    if($status == 2) echo " disabled='disabled'";
}
function getCountInvoice(){
    return db_get_row("SELECT count(*) from invoices where status = 0;")['count'];
}
function getProductById($id){
    return db_get_row("SELECT *from products where product_id = {$id}");
}
function getInfoCart(){
    $total = 0;
    $purchased_total = 0;
    $num = 0;
    if(!empty($_SESSION['cart'])){
        foreach($_SESSION['cart'] as $val){
            $selling_price=getProductById($val['id'])['selling_price'];
            $purchased_price = getProductById($val['id'])['purchased_price'];
            $total += $selling_price *  $val['qty'] ;
            $purchased_total += $purchased_price * $val['qty'];
            $num += $val['qty'];

        }
    }
    $infoCart['total_purchased_price'] = $purchased_total;
    $infoCart['total'] = $total;
    $infoCart['num'] = $num;
    return $infoCart; 
}
function createInvoice($userId){
    $total_price = getInfoCart()['total'];
    $total_purchased_price = getInfoCart()['total_purchased_price'];
    foreach($_SESSION['cart'] as $val){
        db_query("INSERT INTO carts values({$userId},{$val['id']},{$val['qty']})");
    }
    $sql = "INSERT into invoices(user_id,total_price,date_create,payment_type,total_purchased_price,delivered_time,status) values({$userId},{$total_price},now(),'direct-payment',{$total_purchased_price},now(),2)";
    db_query($sql);
    unset($_SESSION['cart']);
}