<?php
function getInforAccount($id){
    return db_get_row("SELECT *from users where user_id = {$id}");
}