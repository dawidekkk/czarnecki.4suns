<?php 

$db['db_host'] = '';
$db['db_user'] = '';
$db['db_pass'] = '';
$db['db_name'] = '';

foreach($db as $key=>$value) {
  define(strtoupper($key), $value); 
}

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if(!$connection) {
  echo "Connection error ";
  echo  mysqli_connect_error();
}
?>
