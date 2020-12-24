<?php
function construct () {
    load_model('index');
}

function indexAction(){
    $error = array();
    $data['error'] = $error;
    load('lib','validation');
    load_view('index',$data);
}
function logoutAction(){
    del_session('user');
    $_SESSION['logout'] = true;
    direct_to(base_url("?"));
}
function registerAction(){
    $error = array();
    $data['error'] = $error;
    load('lib','validation');
    load_view('register',$data);
}
function showinforAction () {
    $error = array();
    $data['error'] = $error;
    $userif = get_user_infor();
    $data['userif'] = $userif;
    load('lib','validation');
    load_view('showinfor',$data);
}