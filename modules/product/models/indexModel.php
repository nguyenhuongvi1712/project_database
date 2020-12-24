<?php

function get_product_by_id($id){
    $result = db_get_row("SELECT *FROM products WHERE product_id = {$id} and status = 1 ");
    return $result;
}
function get_detail_product_by_id($id,$type){
    if($type==1)
        $result = db_get_row("select screen \"Màn Hình\",battery_capacity \"Dung lượng pin\",rear_camera \"Camera sau\",front_camera \"Camera trước\",sim \"Sim\",ram \"RAM\",rom \"ROM\",hdh \"Hệ điều hành\",cpu \"CPU\" from smart_phone WHERE product_id = {$id}");
    else if($type==2)
        $result = db_get_row("select cpu \"CPU\",ram \"RAM\",hard_drive \"Ổ cứng\",screen \"Màn hình\",graphic_card \"Card đồ họa\",connector \"Cổng kết nối\",operating_system \"Hệ điều hành\",design \"Thiết kế \",size \"Kích thước\",time_of_launch \"Thời điểm ra mắt\" from laptop WHERE product_id = {$id} ");
    else if($type == 3)
        $result = db_get_row("select screen \"Màn hình\",battery_capacity \"Dung lượng pin\",rear_camera \"Camera sau\",front_camera \"Camera trước\",damthoai \"Đàm thoại\",ram \"RAM\",rom \"ROM\",hdh \"Hệ điều hành\",cpu \"CPU\",weight \"Trọng lượng\" from tablet  WHERE product_id = {$id} ");
    else $result = false;
    return $result;
}