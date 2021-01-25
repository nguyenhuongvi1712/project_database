<?php
function getListCustomer(){
    return db_fetch_array("SELECT  users.*from users where user_id in (select user_id from invoices );");
}
function getListUser(){
    return db_fetch_array("SELECT *from users");
}
function getCountUser($select='customer'){
    if($select=='customer'){
        $result = db_get_row("SELECT count(users.*) from users where user_id in (select user_id from invoices );");
    }
    else if($select=='user'){
        $result = db_get_row("SELECT count(*) from users;");
    }
    if($result) return $result['count'];
    else return 0;
}
function getInfoUser($id){
    return db_get_row("SELECT *from users where user_id = {$id}");
}
function getInvoiceByUserId($id){
    return db_fetch_array("SELECT *from invoices where user_id = {$id}");
}
function getTotalPriceOfUser($id){
    return db_get_row("SELECT sum(total_price) from invoices where user_id = {$id} and status = 2;")['sum'];
}
function getListSearch($keyWord){
    $pattern = "/[0-9]/";
    $keyWordLower = strtolower($keyWord);
    if (preg_match($pattern, $keyWord))
        $sql = "SELECT user_id,email,username from users where lower(email) like '%{$keyWordLower}%' or user_id = {$keyWord} or tel_number like '{$keyWordLower}' limit 10";
    else
        $sql = "SELECT user_id,email,username from users where lower(email) like '%{$keyWordLower}%' or tel_number like '{$keyWordLower}' limit 10";
    return db_fetch_array($sql);
}
function getListStatisticCustomer(){
    return db_fetch_array("SELECT users.*,i.sum from users inner join (select sum(total_price),user_id from invoices where status =2 group by (user_id) order by sum limit 10) as i using(user_id) 
    order by i.sum");
}