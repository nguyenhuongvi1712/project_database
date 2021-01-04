<?php
function getListSearch($keyWord){
    $pattern = "/[0-9]/";
    $keyWordLower = strtolower($keyWord);
    if (preg_match($pattern, $keyWord))
        $sql = "SELECT product_name , product_id,type from products where lower(product_name) like '%{$keyWordLower}%' or product_id = {$keyWord} limit 10";
    else
        $sql = "SELECT product_name , product_id,type from products where lower(product_name) like '%{$keyWordLower}%' limit 10";
    return db_fetch_array($sql);
}