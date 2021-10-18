<?php
    

//$mysqli = new mysqli("localhost","root","","ksf");
/*$sql_host =     "localhost";      
$sql_username = "root";    
$sql_password = "";       
$sql_database = "ksf";   */    



$host = "localhost";      
$un = "root";    
$pw = "";       
$db = "ksf"; 

$MYSQLI_CONNECT = mysqli_connect($host, $un, $pw, $db);

//will not display notices
@error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED );  

if(!function_exists("mysql_query")) {
	
	
function mysql_query($q) {
    global $MYSQLI_CONNECT;
    return mysqli_query($MYSQLI_CONNECT,$q);
}

function mysql_fetch_assoc($q) {
    return mysqli_fetch_assoc($q);
}

function mysql_fetch_array($q){
    return mysqli_fetch_array($q , MYSQLI_BOTH);
}

function mysql_fetch_row($q){
    return mysqli_fetch_row($q);
}


function mysql_num_rows($q){
    return mysqli_num_rows($q);
}
function mysql_result($res, $row, $field=0) {
    $res->data_seek($row);
    $datarow = $res->fetch_array();
    return $datarow[$field];
}
if (function_exists('get_magic_quotes_runtime') && @get_magic_quotes_runtime() == 1) {
set_magic_quotes_runtime(false);
}

function mysql_insert_id() {
    global $MYSQLI_CONNECT;
    return mysqli_insert_id($MYSQLI_CONNECT);
}

function mysql_real_escape_string($q) {
    global $MYSQLI_CONNECT;
    return mysqli_real_escape_string($MYSQLI_CONNECT,$q);
}
}
?>