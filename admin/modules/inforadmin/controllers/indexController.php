<?php

use WindowsAzure\ServiceManagement\Models\Location;

function construct(){
    load_model('index');
}
function indexAction(){
    
    $data['admin_if'] = get_infor_admin();
    load_view('index',$data);
}
function changePasswordAction(){
    load('lib','validation');
    $data['error'] = array();
    $data['admin_if'] = get_infor_admin();
    load_view('changePassword',$data);
}
function logoutAdminAction(){
    header("Location: http://localhost/php/project/is_mart/");
}
function addNewAdminAction(){
    load('lib','validation');
    load('lib','user');
    $data['error'] = array();
    load_view('addNewAdmin',$data);
}