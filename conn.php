<?php 

// connecting to server (server,username,password)
$connect = mysqli_connect("localhost","root","")or die(mysqli_error());

mysqli_select_db($connect,"mydb");

?>