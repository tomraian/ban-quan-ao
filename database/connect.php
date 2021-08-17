<?php
header("Content-type: text/html; charset=utf-8");
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "banquanao";

// tạo kết nối 
$connect = mysqli_connect($hostname, $username, $password, $dbname);
mysqli_set_charset($connect, 'UTF8');
// kiểm tra kểt nối 
if (mysqli_connect_errno()) {
  die("không thể kết nối tới database");
  exit();
}
?>