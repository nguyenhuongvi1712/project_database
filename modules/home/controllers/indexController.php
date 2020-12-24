<?php

function construct() {
//    echo "DÙng chung, load đầu tiên";
    load_model('index');
}

function indexAction() {
    load('helper','format');
    $data['type'] = array(1,2,3);
    // load_view còn có 1 hàm ko truyền $data 
    load_view('index',$data); // gọi view để làm việc và truyền $data vào view

}


function editAction() {
    $id = (int)$_GET['id'];
    $item = get_user_by_id($id);
    show_array($item);
}
// đường link truy cập chức năng
// mod=...&controler=...&action=
// models là nơi làm việc với các db.