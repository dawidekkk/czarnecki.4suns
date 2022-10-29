<?php 

$db['db_host'] = 'serwer1936460.home.pl';
$db['db_user'] = '31300146_czarnecki';
$db['db_pass'] = 'vKsO7Xd7';
$db['db_name'] = '31300146_czarnecki';

foreach($db as $key=>$value) {
  define(strtoupper($key), $value); // define function defines a CONSTANT (Constant value can't be changed after it is set.)
  // also constant names don't need a DOLLAR SIGN($)! Or constants can be accessed regardless of scope. 
  // echo 'key: '. $key . ' ' . 'value: ' . $value .'<br />';
}

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if(!$connection) {
  echo "Connection error ";
  echo  mysqli_connect_error();
  // echo '123';
}

// if($connection) {
//   echo 'conffes';
// }

?>