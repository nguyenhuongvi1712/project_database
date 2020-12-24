<?php
function construct() {
    load_model('index');
}
function get_price_total($customer_id){
    $price_total = 0;
    $result = get_list_item_cart($customer_id);
    if(!empty($result)){
        foreach($result as $val){
            $price_total += $val['sub_total'];
        }
    }
    return $price_total;
}

function indexAction(){
    if(!get_session('user')){
        direct_to(base_url("?mod=user"));
    }
    $customer_id = get_customer_id_by_email();
    $cart = get_list_item_cart($customer_id);
    $price_total = get_price_total($customer_id);
    $data['price_total'] = $price_total;
    $data['cart'] = $cart;
    load_view('index',$data);
}
function addAction(){
    if(!get_session('user')){
        direct_to(base_url("?mod=user"));
    }
    $customer_id = get_customer_id_by_email();
    $product_id = $_GET['id'];
    $quantity = get_quantity($product_id,$customer_id);
    add_cart($product_id,$customer_id,$quantity);
    direct_to(base_url("?mod=cart"));
}
function updateAction(){
    $customer_id = get_customer_id_by_email();
    $product_id = (int) $_POST['id'];
    $price = (int) $_POST['price'];
    $qty =(int) $_POST['qty'];
    
    update_cart($product_id,$customer_id,$qty);

    $sub_total = number_format($price * $qty);
    $total_price = number_format(get_price_total($customer_id));
    $num_of_cart = get_infor_carts();
    $data = array(
    'sub_total' => $sub_total,
    'total_price' => $total_price,
    'num' => $num_of_cart
    );
    echo json_encode($data);
}
function delAction(){
    $customer_id = get_customer_id_by_email();
    $product_id = $_GET['id'];
    del_cart_by_id($customer_id,$product_id);
    direct_to(base_url("?mod=cart"));
}
function delallAction(){
    $customer_id = get_customer_id_by_email();
    delALl_cart_by_id($customer_id);
    direct_to(base_url("?mod=cart"));
}
function checkoutAction(){
    load_model('invoice');
    $data['user_if'] = get_user_infor();
    $customer_id = (int) get_customer_id_by_email();
    $data['cart'] = get_list_item_cart($customer_id);
    $data['price_total'] = get_price_total($customer_id);
    load_view('checkout',$data);
}