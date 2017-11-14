<?php
$server_username = "root";// thông tin đăng nhập host
$server_password = ""; //mặc định là rỗng
$server_host ="localhost";
$database = "webtintuc";

//tạo kết nối database dùng mysqli_connect
$connect = mysqli_connect($server_host, $server_username, $server_password, $database);
// $connect = mysqli_connect("localhost","root","","webtintuc");
//set để truyền dữ liệu lên có thể là tiếng việt
mysqli_query($connect,"SET NAMES 'UTF8'");
if(!$connect)
  echo "not connect to databse".mysqli_connect_error();
?>
