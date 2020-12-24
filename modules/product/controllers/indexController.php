<?php
function construct () {
    load_model('index');
}
function indexAction () {
    $id_cat =(int) $_GET['id'];
    $list_product = get_list_product_by_categories_id($id_cat);
    $data['list_product'] = $list_product;
    if($id_cat==1) $data['category_name'] = "Điện thoại";
    else if($id_cat==2) $data['category_name'] = "Laptop";
    else if($id_cat==3) $data['category_name'] = "Máy tính bảng";
    else $data['category_name'] = false;
    load_view('index',$data);
}

function detailAction () {
    $id_product = (int) $_GET['id'];
    $product = get_product_by_id($id_product);
    $type = $product['type'];
    $data['detail_product'] = get_detail_product_by_id($id_product,$type);
    $data['product'] = $product;
    load_view('detail',$data);

}


