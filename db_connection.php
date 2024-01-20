<?php
$servername ="localhost:3306";
$username ="root";
$password ="";
$databasename ="testPhp";

//Tạo hàm connection
$conn = new mysqli($servername,$username,$password,$databasename);

//Kiểm tra xem đã kết nối được database chưa.

if ($conn->connect_errno){
    die("Connection failed :".$conn->connect_errno);
}
?>
