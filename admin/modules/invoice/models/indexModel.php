<?php
function getListInvoices($status=3)
{
    if ($status == 3)
        return db_fetch_array("SELECT invoices.*,username from invoices inner join users using(user_id)");
    else
        return db_fetch_array("SELECT invoices.*,username from invoices inner join users using(user_id) where status = {$status}");
}
function getInforInvoice($id){
    return db_get_row("SELECT invoices.*,username,tel_number from invoices invoices inner join users using(user_id) where invoice_id = {$id}");
}
function getListPayment($id){
    return db_fetch_array("SELECT payments.*,thump_link,product_name from payments inner join products using(product_id) where invoice_id = {$id}");
}
function getCountOfInvoice(){
   $data = db_get_row("SELECT count(*) from invoices");
   $count['countAll'] = empty($data)?0:$data['count'];
   $data = db_get_row("SELECT count(*) from invoices where status = 0");
   $count['count0'] = empty($data)?0:$data['count'];
   $data = db_get_row("SELECT count(*) from invoices where status = 1");
   $count['count1'] = empty($data)?0:$data['count'];
   $data = db_get_row("SELECT count(*) from invoices where status = 2");
   $count['count2'] = empty($data)?0:$data['count'];
   return $count;
}
