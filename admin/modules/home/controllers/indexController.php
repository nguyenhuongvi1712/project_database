<?php

function construct() {
    load_model('index');
}

function indexAction() {
    load('helper','format');
    $data['count'] = getProductCount();
    $data['list_product'] = get_list_product();
    $data['trashCount'] = getTrashCount();
    load_view('index',$data);
}
function detailAction(){
    load('helper','format');
    $id = (int) $_GET['id'];
    $data['count'] = getProductCount();
    $data['trashCount'] = getTrashCount();
    $data['list_product'] = get_list_product("","",$id,'create');
    load_view('index',$data); 
}

function editAction() {
    $id = (int)$_GET['id'];
    $item = get_user_by_id($id);
    show_array($item);
}
