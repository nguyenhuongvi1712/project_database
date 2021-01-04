<?php
function construct(){
    load_model('index');
}
function indexAction(){
    $data['userCount'] = getCountUser('user');
    $data['customerCount'] = getCountUser();
    $data['listCustomer'] = getListCustomer();
    load_view('index',$data);
}
function userAction(){
    $data['userCount'] = getCountUser('user');
    $data['customerCount'] = getCountUser();
    $data['listCustomer'] = getListUser();
    load_view('index',$data);
}
function detailAction(){
    load('lib','validation');
    load('helper','format');
    $userId = (int) $_GET['id'];
    if(is_idproduct($userId)){
        $data['userInfo'] = getInfoUser($userId);
        $data['totalPrice'] = getTotalPriceOfUser($userId);
        $data['invoiceList'] = getInvoiceByUserId($userId); 
    }
    else{
        $data['userInfo'] = null;
        $data['totalPrice'] = null;
        $data['invoiceList'] = null;
    }
    load_view('detail',$data);
}
function searchAction(){
    $keyWord = $_POST['keyWord'];
    $data = getListSearch($keyWord);
    $listSearch = "";
    if ($data) {
        $listSearch = $listSearch."<ul>";
        foreach ($data as $val) {
            $listSearch = $listSearch."<li><a href=\"?mod=customer&action=detail&id={$val['user_id']}\">{$val['email']}</a></li>";
        }
        $listSearch = $listSearch."</ul>";
    }
    else{
        $listSearch = "<ul><li>Không có kết quả tìm kiếm</li><ul>";
    }
    echo $listSearch;
}