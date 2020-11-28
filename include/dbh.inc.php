<?php
  define("DBHOST",'localhost');
  define('DBUSERNAME','root');
  define('DBPASSWORD','');
  define('DBNAME','phpProject0');

  $conn = mysqli_connect(DBHOST,DBUSERNAME,DBPASSWORD,DBNAME);

  if(!$conn){
    die("Connection failed!".mysqli_connect_error());
  }
?>