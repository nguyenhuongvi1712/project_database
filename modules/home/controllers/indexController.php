<?php

function construct() {
    load_model('index');
}

function indexAction() {
    load('helper','format');
    if(isset($_GET['sort'])) $data['sort'] = $_GET['sort'];
    $data['type'] = array(1,2,3);
    $data['bestSellers'] = getBestSellers();
    load_view('index',$data); 

}
function editAction() {
    $id = (int)$_GET['id'];
    $item = get_user_by_id($id);
    show_array($item);
}
function searchAction(){
    $keyWord = $_POST['keyWord'];
    $data = getListSearch($keyWord);
    $listSearch = "";
    if ($data) {
        $listSearch = $listSearch."<ul>";
        foreach ($data as $val) {
            $listSearch = $listSearch."<li><a href=\"?mod=product&action=detail&id={$val['product_id']}\">{$val['product_name']}</a></li>";
        }
        $listSearch = $listSearch."</ul>";
    }
    else{
        $listSearch = "<ul><li>Không có kết quả tìm kiếm</li><ul>";
    }
    echo $listSearch;
}
