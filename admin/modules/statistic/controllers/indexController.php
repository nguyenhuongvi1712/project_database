<?php
function construct(){
    load_model('index');
}
function indexAction(){
    load('lib','validation');
    load('helper','format');
    $option =(int) isset($_GET['option'])?$_GET['option']:0;
    $from =  isset($_GET['from'])&&is_date($_GET['from'])?$_GET['from']:0;
    $to = isset($_GET['to'])&&is_date($_GET['to'])?$_GET['to']:0;
    $data['list'] = getListStatisticProduct($option,$from,$to);
    load_view('index',$data);
}
function searchAction(){
    load('helper','format');
    load('lib','validation');
    $id = (int) isset($_GET['id'])&&is_idproduct($_GET['id'])?$_GET['id']:null;
    $data['list'] = searchResult($id);
    load_view('search',$data);
}

function turnOverAction(){
    load('helper','format');
    load('helper','producthp');
    load('lib','validation');
    $id = (int) isset($_GET['id'])&&is_idproduct($_GET['id'])?$_GET['id']:null;
    $data['list'] = getListTurnOver($id);
    load_view('turnOver',$data);
}
function revenueAction(){
    load('lib','validation');
    load('helper','format');
    $from =  isset($_GET['from'])&&is_date($_GET['from'])?$_GET['from']:0;
    $to = isset($_GET['to'])&&is_date($_GET['to'])?$_GET['to']:0;
    $date = "";
    if(!$from&&$to) $date = "đến {$to}";
    else if($from&&!$to) $date = "từ {$from}";
    else if($from&&$to) $date = "{$from} - {$to}";
    $data['date'] = $date; 
    $data['list'] = getListRevenue($from,$to);
    load_view('revenue',$data);
}