<?php
use function PHPSTORM_META\type;
// Hàm kết nối dữ liệu
function db_connect(){
    global $conn,$db;
    $options = [
        \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION, // xử lí ngoại lệ
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $dsn = "pgsql:host={$db['hostname']};dbname={$db['database']}";
    if (!$conn){
        try {
   
            $conn = new \PDO($dsn,"{$db['username']}","{$db['password']}", $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}
//Thực thi chuổi truy vấn
function db_query($sql){
    db_connect();
    global $conn;
    $data = $conn->query($sql);
    if(!$data) db_sql_error('Query Error', $sql);
    return $data;
}


// Lấy một dòng trong CSDL
function db_get_row($sql){
    global $conn;
    $result = db_query($sql);
    $row = array();
    if ($result->rowCount() > 0){
        $row = $result -> fetch(PDO::FETCH_ASSOC);
    }    
    return $row;
}

//Lấy một mảng trong CSDL
function db_fetch_array($sql){
    global $conn;
    $result = array();
    $pgsql_result = db_query($sql);
    if($pgsql_result->rowCount() >0){
        $result = $pgsql_result -> fetchAll(PDO::FETCH_ASSOC);
    }
    return $result;
}

//Lấy số bản ghi
function db_num_rows($query_string) {
    global $conn;
    $sql_result = db_query($query_string);
	return $sql_result -> rowCount();
}

function db_insert($table, $data) {
    global $conn;
    $fields = "(" . implode(", ", array_keys($data)) . ")";
    $values = "";
    foreach ($data as $field => $value) {
        if ($value === NULL)
            $values .= "NULL, ";
        else
            $values .= "'" . escape_string($value) . "', ";
    }
    $values = substr($values, 0, -2);
    db_query("
            INSERT INTO $table $fields
            VALUES($values)
        ");
    return $conn -> lastInsertId();
}

function db_update($table, $data, $where) {
    global $conn;
    $sql = "";
    foreach ($data as $field => $value) {
        if ($value === NULL)
            $sql .= "$field=NULL, ";
        else
            $sql .= "$field='" . escape_string($value) . "', ";
    }
    $sql = substr($sql, 0, -2);
    $query_string = "UPDATE ". $table. " SET ".$sql. " WHERE $where";
    $result = db_query($query_string);
    return $result -> rowCount();
}

function db_delete($table, $where) {
    global $conn;
    $query_string = "DELETE FROM " . $table . " WHERE $where";
    $result = db_query($query_string);
    return $result -> rowCount();
    
}

function escape_string($str) {
   return addcslashes($str,"',<>");
}
function db_close(){
    global $conn;
    $conn = null;
}

// Hiển thị lỗi SQL

function db_sql_error($message, $query_string = "") {
    global $conn;
    $sqlerror = "<table width='100%' border='1' cellpadding='0' cellspacing='0'>";
    $sqlerror.="<tr><th colspan='2'>{$message}</th></tr>";
    $sqlerror.=($query_string != "") ? "<tr><td nowrap> Query SQL</td><td nowrap>: " . $query_string . "</td></tr>\n" : "";
    $sqlerror.="<tr><td nowrap> Error Number</td><td nowrap>: " . mysqli_errno($conn) . " " . mysqli_error($conn) . "</td></tr>\n";
    $sqlerror.="<tr><td nowrap> Date</td><td nowrap>: " . date("D, F j, Y H:i:s") . "</td></tr>\n";
    $sqlerror.="<tr><td nowrap> IP</td><td>: " . getenv("REMOTE_ADDR") . "</td></tr>\n";
    $sqlerror.="<tr><td nowrap> Browser</td><td nowrap>: " . getenv("HTTP_USER_AGENT") . "</td></tr>\n";
    $sqlerror.="<tr><td nowrap> Script</td><td nowrap>: " . getenv("REQUEST_URI") . "</td></tr>\n";
    $sqlerror.="<tr><td nowrap> Referer</td><td nowrap>: " . getenv("HTTP_REFERER") . "</td></tr>\n";
    $sqlerror.="<tr><td nowrap> PHP Version </td><td>: " . PHP_VERSION . "</td></tr>\n";
    $sqlerror.="<tr><td nowrap> OS</td><td>: " . PHP_OS . "</td></tr>\n";
    $sqlerror.="<tr><td nowrap> Server</td><td>: " . getenv("SERVER_SOFTWARE") . "</td></tr>\n";
    $sqlerror.="<tr><td nowrap> Server Name</td><td>: " . getenv("SERVER_NAME") . "</td></tr>\n";
    $sqlerror.="</table>";
    $msgbox_messages = "<meta http-equiv=\"refresh\" content=\"9999\">\n<table class='smallgrey' cellspacing=1 cellpadding=0>" . $sqlerror . "</table>";
    echo $msgbox_messages;
    exit;
}
