<?php
function construct(){
    load_model('index');
}
function addnewAction(){
    load('lib','validation');
    $data['error'] = array();
    load('helper','format');
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
    $userId = getIdAdmin();
    addToManipulation($userId,$id,'delete');
    echo json_encode($data);
}
function trashAction(){
    load('helper','format');
    $data['count'] = getProductCount();
    $data['trashCount'] = getTrashCount();
    $data['list_product'] = get_list_product("","","","delete",0);
    load_view('trash',$data);
}
function trashDetailAction(){
    load('helper','format');
    $data['count'] = getProductCount();
    $data['trashCount'] = getTrashCount();
    $id = (int) $_GET['id'];
    $data['list_product'] = get_list_product("","",$id,"delete",0);
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
    db_query("DELETE from products where product_id = {$id} and status = 0");
    direct_to(base_url("?mod=product&action=trash"));
}
function updateAction(){
    load_model('update');
    load('helper','producthp');
    load('helper','format');
    load('lib','validation');
    $data['id'] = getIdAdmin();
    $product_id = (int) $_GET['id'];
    $type = (int) $_GET['type'];
    $data['error'] = array();
    $data['product'] = getInforProduct($product_id,$type);
    $data['updateInfor'] = getInforUpdate($product_id);
    if($type == 1)
    load_view('update1',$data);
    else if($type == 2)
    load_view('update2',$data);
    else if($type == 3)
    load_view('update3',$data);

}