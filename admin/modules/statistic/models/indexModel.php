<?php 
function getListStatisticProduct($option,$from,$to){
    $date = "";
    if(!$from&&$to) $date = "and delivered_time <= '{$to}'";
    else if($from&&!$to) $date = "and delivered_time >= '{$from}'";
    else if($from&&$to) $date = "and delivered_time <= '{$to}' and delivered_time >= '{$from}'"; 
    if($option==0){
        //phpAlert("SELECT p.*,product_name,thump_link,delivered_time from payments as p inner join (select invoice_id, delivered_time from invoices where status =2 {$date}) as i using(invoice_id) inner join products using(product_id) order by products.type");
        return db_fetch_array("SELECT p.*,product_name,thump_link,delivered_time from payments as p inner join (select invoice_id, delivered_time from invoices where status =2 {$date}) as i using(invoice_id) inner join products using(product_id) order by products.type");
    }
    else if($option==1){
        //phpAlert("SELECT p.*,product_name,thump_link,delivered_time from payments as p inner join (select invoice_id, delivered_time from invoices where status =2 {$date}) as i using(invoice_id) inner join products using(product_id) order by quantity desc,products.type");
        return db_fetch_array("SELECT p.*,product_name,thump_link,delivered_time from payments as p inner join (select invoice_id, delivered_time from invoices where status =2 {$date}) as i using(invoice_id) inner join products using(product_id) order by quantity desc,products.type");
    }
    else if($option==2){
        //phpAlert("SELECT p.*,product_name,thump_link,delivered_time from payments as p inner join (select invoice_id, delivered_time from invoices where status =2 {$date}) as i using(invoice_id) inner join products using(product_id) order by quantity,products.type");
        return db_fetch_array("SELECT p.*,product_name,thump_link,delivered_time from payments as p inner join (select invoice_id, delivered_time from invoices where status =2 {$date}) as i using(invoice_id) inner join products using(product_id) order by quantity,products.type");
    }
}
function searchResult($id){
    if($id!=null)
    return db_fetch_array("SELECT p.*,product_name,thump_link,delivered_time from payments as p inner join (select invoice_id, delivered_time from invoices where status =2 ) as i using(invoice_id) inner join products using(product_id) where product_id = {$id} order by products.type");
}

function getListTurnOver($id){
    if(!$id)
        return db_fetch_array("SELECT product_id,thump_link,product_name,sum(quantity) as quantity,p.selling_price,p.purchased_price from products left join (select * from payments where invoice_id in (select invoice_id from invoices where status = 2)) as p using(product_id) group by(product_id,p.selling_price,p.purchased_price) order by quantity");
    else
        return db_fetch_array("SELECT product_id,thump_link,product_name,sum(quantity) as quantity,p.selling_price,p.purchased_price from products left join (select * from payments where invoice_id in (select invoice_id from invoices where status = 2)) as p using(product_id) where product_id = {$id} group by(product_id,p.selling_price,p.purchased_price) order by quantity ");
}
function getListRevenue($from=0,$to=0){
    $date = "";
    if(!$from&&$to) $date = "and delivered_time <= '{$to}'";
    else if($from&&!$to) $date = "and delivered_time >= '{$from}'";
    else if($from&&$to) $date = "and delivered_time <= '{$to}' and delivered_time >= '{$from}'"; 
return db_get_row("SELECT sum(total_price) as revenue,sum(total_purchased_price) as cost_of_goods_sold,sum(total_price) -sum(total_purchased_price) as gross_revenue from invoices where status = 2 {$date}");
}