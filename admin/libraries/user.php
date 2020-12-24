<?
function check_is_exist_email($email){
    $data = db_get_row("SELECT *FROM users where email='".$email."'");
    if(!empty($data)) return true;
    return false;
}
// function addToManipulation($user_id,$product_id,$type){
//     $sql = "INSERT INTO manipulations values({$user_id},{$product_id},'{$type}',now())";
//     db_query("$sql");
// }