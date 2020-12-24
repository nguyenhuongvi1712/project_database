<?php
function currency_format($number, $suffix = 'đ'){
    return number_format($number).$suffix;
}
function convert_type_catalogy($id){
    if($id == 1) return "Điện thoại";
    else if($id == 2) return "Laptop";
    else if($id == 3) return "Máy tính bảng";
    else return "Không xác định";
}
function length_of_array($array){
    if(!empty($array)){
        return count($array);
    }
    else return 0;
}

