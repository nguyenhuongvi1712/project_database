<?php
function is_username($username){
    $pattern = "/^[A-Za-z0-9_\.\s]{6,32}$/";
    if (preg_match($pattern, $username))
        return true;
}
function is_password($password) {
    $pattern = "/^([\w_\.!@#$%^&*()]+){5,31}$/";
    if (preg_match($pattern, $password))
    return true;
    
}
function is_email($email) {
    $pattern ="/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
    if (preg_match($pattern, $email))
        return true;
}
function is_tel($tel){
    $pattern = "/^0[0-9]{8,10}$/";
    if (preg_match($pattern, $tel))
        return true;
}
function is_price($price){
    $pattern = "/[0-9]/";
    if (preg_match($pattern, $price))
    return true;
}
function is_idproduct($id){
    $pattern = "/[0-9]/";
    if (preg_match($pattern, $id))
    return true;
}
function is_date($date){
    $pattern = "/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/";
    if (preg_match($pattern, $date))
    return true;
}
function set_value($label_field) {
    global $data;
    if (!empty($data['error']) && !isset($data['error'][$label_field])) {
        echo "value=\"{$_POST[$label_field]}\"";
    }
}
function set_value_textarea($label_field){
    global $data;
    if (!empty($data['error']) && !isset($data['error'][$label_field])) {
        echo $_POST[$label_field];
    }
}
function form_error($label_field) {
    global $data;
    if (isset($data['error'][$label_field])) {
        echo "<span style = \"color:red;\">{$data['error'][$label_field]}</span><br/>";
    }
}

?>