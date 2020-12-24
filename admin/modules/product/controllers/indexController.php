<?php
function construct(){
    load_model('index');
}
function addnewAction(){
    load('lib','validation');
    $data['error'] = array();
    load('helper','format');
    load('helper','user');
    $data['id'] = getIdAdmin();
    if($_GET['id']==1)
        load_view('addnew1',$data);
    else if($_GET['id']==2)
        load_view('addnew2',$data);
    else if($_GET['id']==3)
        load_view('addnew3',$data);
}
function moveToTrashAction(){
    $id = $_POST['id'];
    db_query("UPDATE products set status = 0 where product_id = {$id}");
    $data['count'] = getProductCount();
    $data['trashCount'] = getTrashCount();
    echo json_encode($data);
}
function trashAction(){
    load('helper','format');
    $data['count'] = getProductCount();
    $data['trashCount'] = getTrashCount();
    $data['list_product'] = get_list_product("","","","create",0);
    load_view('trash',$data);
}
function trashDetailAction(){
    load('helper','format');
    $id = (int) $_GET['id'];
    $data['list_product'] = get_list_product("","",$id,0);
    load_view('trash',$data); 
}
function restoreAction(){
    $id = (int) $_POST['id'];
    db_query("UPDATE products set status = 1 where product_id = {$id}");
    $data['count'] = getProductCount();
    $data['trashCount'] = getTrashCount();
    echo json_encode($data);
}
function delAction(){
    $id = (int) $_GET['id'];
    db_query("DELETE from products where product_id = {$id}");
    direct_to(base_url("?mod=product&action=trash"));
}
function testAction(){
    load_view('test');
}