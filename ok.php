<?php
include('connect.php');

$id=mysqli_real_escape_string($conn,$_POST['id']);
$pw=mysqli_real_escape_string($conn,$_POST['pw']);
$name=mysqli_real_escape_string($conn,$_POST['name']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$phone=mysqli_real_escape_string($conn,$_POST['phone']);
$way=mysqli_real_escape_string($conn,$_POST['way']);

$s= mysqli_query($conn, "INSERT INTO member VALUES(NULL,'$id','$pw','$name','$email', '$phone', '$way','user','0')");

if($s)
{
	echo "註冊成功 請等待審核";
	echo "<meta http-equiv='refresh' content='2; url=http://sweb.name/~ncu109102516/contact2.html'>";

}
else
{
	echo "註冊失敗 請重新輸入資料";
	echo "<meta http-equiv='refresh' content='2; url=signup.php'>";
}

?>






