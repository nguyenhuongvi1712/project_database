<?php

function show_array($data) {
    if (is_array($data)) {
        echo "<pre>";
        print_r($data);
        echo "<pre>";
    }
}
function get_list_categories($type){
    if($type==1)
        return "Điện thoại";
    else if($type == 2)
        return "Laptop";
    else if($type==3)
        return "Máy tính bảng";
}
function get_list_product_by_categories_id($type){ 
    $result = db_fetch_array("SELECT *FROM products WHERE type = {$type} and status = 1");
    return $result;
}
function get_current_username(){
    $current_username = get_session('user');
    if($current_username == false) echo "bạn";
    else echo "<a href=\"?mod=user&action=showinfor\"style=\"font-weight:bold;color:black;\">{$current_username['username']}</a>";
}


