<?php
function construct(){
    load_model('index');
}
function indexAction(){
    load('helper','format');
    $data['count'] = getCountOfInvoice();
    $data['invoice'] = getListInvoices();
    load_view('index',$data);
}
function detailAction(){
    load('helper','format');
    load('lib','validation');
    if (is_idproduct($_GET['id'])) {
        $invoiceId = (int) $_GET['id'];
        $data['invoice'] = getInforInvoice($invoiceId);
        $data['detailInvoice'] = getListPayment($invoiceId);
    }
    else{
        $data['invoice'] = null;
        $data['detailInvoice'] = null;
    }
    load_view('detail',$data);
}
function statusAction(){
    $status = (int) $_GET['id'];
    load('helper','format');
    $data['count'] = getCountOfInvoice();
    $data['invoice'] = getListInvoices($status);
    load_view('index',$data);
}
function delAction(){
    $id =(int) $_GET['id'];
    db_query("DELETE from invoices where invoice_id = {$id} and status!=2 ");
    direct_to(base_url("?mod=invoice"));
}