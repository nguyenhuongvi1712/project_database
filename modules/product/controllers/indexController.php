<?php
function construct () {
    load_model('index');
}
function filterBox($arr){
    $str="";
    if(!empty($arr)){
        foreach($arr as $val){
            foreach($val as $valDetail){
                $str=$str."<span class=\"btn btn-outline-secondary btn-sm m-2\" name=\"".$valDetail."\">".$valDetail."</span>";
            }
        }
    }
    return $str;
}
function indexAction () {
    $id_cat =(int) $_GET['id'];
    if(isset($_POST['sm-filter-box'])){
        unset($_POST['sm-filter-box']);
        if ($_POST && $_GET['id']==1) {
            $data['filter-box'] = $_POST;
            $data['spanFilterBox'] = filterBox($_POST);
            if (isset($_POST['ram'])) {
                foreach ($_POST['ram'] as $key => $val) {
                    $_POST['ram'][$key] =  chop($val, '-GB');
                }
            }
            if (isset($_POST['rom'])) {
                foreach ($_POST['rom'] as $key => $val) {
                    $_POST['rom'][$key] = chop($val, '-GB');
                }
            }
            $data['list_product'] = getProductsByFilterBox($_POST,1);
        }
        else if($_POST && $_GET['id']==2){
            $data['filter-box'] = $_POST;
            $data['spanFilterBox'] = filterBox($_POST);
            if (isset($_POST['ram'])) {
                foreach ($_POST['ram'] as $key => $val) {
                    $_POST['ram'][$key] =  chop($val, '-GB');
                }
            }
            if(isset($_POST['cpu'])){
                foreach($_POST['cpu'] as $key => $val){
                    $_POST['cpu'][$key] = str_replace('_',' ',$val);
                }
            }
            if(isset($_POST['graphic_card'])){
                foreach($_POST['graphic_card'] as $key => $val){
                    $_POST['graphic_card'][$key] = str_replace('-',' ',$val);
                }
            }
            if(isset($_POST['screen'])){
                foreach($_POST['screen'] as $key => $val){
                    $_POST['screen'][$key] = str_replace('_','.',$val);
                    $_POST['screen'][$key] = str_replace('inch',' inch',$val);
                }
            }
            $data['list_product'] = getProductsByFilterBox($_POST,2);
        }
        else if ($_POST && $_GET['id']==3) {
            $data['filter-box'] = $_POST;
            $data['spanFilterBox'] = filterBox($_POST);
            if (isset($_POST['ram'])) {
                foreach ($_POST['ram'] as $key => $val) {
                    $_POST['ram'][$key] =  chop($val, '-GB');
                }
            }
            if (isset($_POST['rom'])) {
                foreach ($_POST['rom'] as $key => $val) {
                    $_POST['rom'][$key] = chop($val, '-GB');
                }
            }
            if(isset($_POST['screen'])){
                foreach($_POST['screen'] as $key => $val){
                    $_POST['screen'][$key] = str_replace('_','.',$val);
                    $_POST['screen'][$key] = chop($val, 'inch');
                }
            }
            $data['list_product'] = getProductsByFilterBox($_POST,3);
        }
        else{
            $list_product = get_list_product_by_categories_id($id_cat);
            $data['list_product'] = $list_product;
        }
    }
    else{
        $list_product = get_list_product_by_categories_id($id_cat);
        $data['list_product'] = $list_product;
    }
    if ($id_cat==1) {
        $data['category_name'] = "Điện thoại";
    } elseif ($id_cat==2) {
        $data['category_name'] = "Laptop";
    } elseif ($id_cat==3) {
        $data['category_name'] = "Máy tính bảng";
    } else {
        $data['category_name'] = false;
    }
    load_view('index', $data);
    
}

function detailAction () {
    $pattern = "/[0-9]/";
    $id_product = (int) $_GET['id'];
    $data['detail_product'] = array();
    $data['product'] = array();
    if (preg_match($pattern, $id_product)) {
        $product = get_product_by_id($id_product);
        if ($product) {
            $type = $product['type'];
            $data['detail_product'] = get_detail_product_by_id($id_product, $type);
            $data['product'] = $product;
        }
    }
    load_view('detail',$data);
}



