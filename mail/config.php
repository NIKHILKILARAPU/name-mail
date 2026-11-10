<?php
$server='localhost';
$username='root';
$password='';
$dbname = 'mail';
$conn=mysqli_connect($server,$username,$password,$dbname);
if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}
mysqli_select_db($conn,$dbname);

?>