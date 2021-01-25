<?php
function construct(){
    load_model('index');
}
function indexAction(){
    load('helper','format');
    load('lib','validation');
    $data['error'] = array();
    $data['listCart'] = array();
    if(!empty($_SESSION['cart'])) $data['listCart'] = $_SESSION['cart'];
    load_view('index',$data);
}
function addCartAction(){
    $id = $_GET['id'];
    $qty=1;
    if(isset($_SESSION['cart']))
        $qty=(array_key_exists($id,$_SESSION['cart']))?$_SESSION['cart'][$id]['qty']+=1:1;
    $item = array(
        'qty' => $qty,
        'id' => $id
    );
    $_SESSION['cart'][$id] = $item;
    direct_to(base_url("?mod=offlinePayment"));
}
function updateCartAction(){
    $product_id = (int) $_POST['id'];
    $price = (int) $_POST['price'];
    $qty =(int) $_POST['qty'];
    
    $_SESSION['cart'][$product_id]['qty'] = $qty;

    $sub_total = number_format($price * $qty);
    $total_price = number_format(getInfoCart()['total'])." ,VNĐ";
    $num_of_cart = getInfoCart()['num'];
    $data = array(
    'sub_total' => $sub_total,
    'total_price' => $total_price,
    'num' => $num_of_cart
    );
    echo json_encode($data);
}
function delCartAction(){
    $id = $_GET['id'];
    if(isset($_SESSION['cart'][$id])) unset($_SESSION['cart'][$id]);
    direct_to(base_url("?mod=offlinePayment"));
}
function delAllCartAction(){
    if(isset($_SESSION['cart'])) unset($_SESSION['cart']);
    direct_to(base_url("?mod=offlinePayment"));
}
function checkAccountAction(){
    $customerId = (int) $_POST['id'];
    $customerInfo = getInforAccount($customerId);
    if ($customerInfo) {
        $data['username'] = ($customerInfo['username'])?$customerInfo['username']:"";
        $data['tel_number'] = ($customerInfo['tel_number'])?$customerInfo['tel_number']:"";
        $data['email'] = ($customerInfo['email'])?$customerInfo['email']:"";
    }
    else{
        $data['username']="";
        $data['tel_number']="";
        $data['email'] ="";
    }
    echo json_encode($data);
}

