<?php

$conn = mysqli_connect('localhost', 'root', '1234', 'phpblog');

if(mysqli_connect_errno()){
  echo 'Failed to connect to MySQL database '.mysqli_connect_errno();
}

 ?>
