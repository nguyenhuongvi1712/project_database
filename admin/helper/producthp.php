<?php 
function update($pd,$dt,$id,$type){
    if($pd){
        $sqlPd = "UPDATE products set ";
        foreach($pd as $key => $val){
             if(trim($key,"'")=="selling_price"&&trim($key,"'")!="purchased_price") $sqlPd = $sqlPd.trim($key,"'")." = ".$val." , ";
             else $sqlPd = $sqlPd.trim($key,"'")." = '". $val."' , ";
        }
        $sqlPd = chop($sqlPd," , ")." WHERE product_id = {$id}";
        db_query($sqlPd);
    }
    if ($dt) {
        if($type == 1) $sqlDt = "UPDATE smart_phone set ";
        else if($type == 2) $sqlDt = "UPDATE laptop set ";
        else if($type == 3) $sqlDt = "UPDATE tablet set ";
        if ($type==1||$type==2||$type==3) {
            foreach ($dt as $key => $val) {
                $sqlDt = $sqlDt.trim($key,"'")." = '{$val}' , ";              
            }
            $sqlDt = chop($sqlDt, " , ")." WHERE product_id = {$id}";
            db_query($sqlDt);
        } 
    }
}
function getPrice($product_id,$option=0){
    if($option==0) $sql = "SELECT selling_price as a from products where product_id = {$product_id}";
    else if($option==1) $sql = "SELECT purchased_price as a from products where product_id = {$product_id}";
    $data = db_get_row($sql);
    return $data['a'];
}