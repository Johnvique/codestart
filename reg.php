<?php
$name=$_POST['fname'];
$dob=$_POST['dob'];
$email=$_POST['mail'];
$pass=md5($_POST['passd']);

$connect=mysqli_connect("localhost","root","")or die(mysqli_error());
 if (!$connect) {
 	echo "Not connected";
 }else{
 	mysqli_select_db($connect,"mydb");

 	$query="INSERT INTO `mytable1`(`username`, `dob`, `password`, `email`) VALUES ('$name','$dob','$pass','$email')"; 

 	$execute=mysqli_query($connect,$query) or die(mysqli_error($connect));
 	if (!$execute) {
 		mysqli_error($connect);
 	}

 	$select_query="SELECT * FROM `mytable1` WHERE `username`='$name' AND `email`='$email' AND `password`='$pass'";

 	$select_execute=mysqli_query($connect,$select_query) or die("select_error");

 	while ($result=mysqli_fetch_array($select_execute)) {
 		
 	 	session_start();
 	 	$_SESSION['uname']=$result['username'];
 	 	$_SESSION['mail']=$result['email'];

 	 	header("Location:dashboard.php");
 	 } 
 }















?>