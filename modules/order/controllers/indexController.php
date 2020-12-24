<?php
function construct() {
    load_model('index');
}
function indexAction(){
    $data['list_order'] = get_list_order();
    load_view('index',$data);
}
function detailAction(){
    $invoice_id = (int) $_GET['id'];
    $data['order_if'] = get_if_order_by_id($invoice_id);
    $data['list_detail_order'] = get_list_detail_order_by_id($invoice_id);
    load_view('detail',$data);
}