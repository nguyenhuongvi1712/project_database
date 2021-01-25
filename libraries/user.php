<?php
function check_user($email,$password){
    $pw = md5($password);
    $sql= "SELECT *FROM users WHERE email='".$email."' AND password='".$pw."'";
    $data = db_get_row($sql);
    if(!empty($data)) return $data['username'];
    return false;
}
function get_type_of_user($email){
    $sql= "SELECT *FROM users WHERE email='".$email."'";
    $data = db_get_row($sql);
    if(!empty($data)) return $data['type'];
    return false;

}
function check_is_exist_email($email){
    $data = db_get_row("SELECT *FROM users where email='".$email."'");
    if(!empty($data)&&$data['type']!=2) return true;
    return false;
}
function get_customer_id_by_email(){
    $customer_id = 0;
    if (get_session('user')) {
        $email = $_SESSION['user']['email'];
        $data = db_get_row("SELECT user_id FROM users where email='".$email."'");
        $customer_id = $data['user_id'];
    }
    return $customer_id; 
}
function get_infor_carts(){
    $result['sum'] = 0;
    $customer_id = get_customer_id_by_email();
    if($customer_id!=0){
        $result = db_get_row("SELECT sum(quantity) as sum from carts where user_id = {$customer_id}");
    }
    return $result['sum'];
}
