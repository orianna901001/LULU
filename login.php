<?php
session_start();
include ('connect.php');

$id= mysqli_real_escape_string($conn,$_POST['id']);
$pw= mysqli_real_escape_string($conn,$_POST['pw']);

if($id =="" || $pw ==""){
	echo "請輸入帳號/密碼";
	echo "<meta http-equiv='refresh' content='2; url=homepage.html'>";
}else {
    $s = mysqli_query($conn,"SELECT* FROM member WHERE id = '$id' AND pw='$pw' AND active='1'");	
    $r = mysqli_fetch_array($s);

if($r)

{
$_SESSION['id']= $r['id'];
$_SESSION['auth']= $r['auth'];

echo "登入成功";
echo "<meta http-equiv='refresh' content='2; url=score.php'>";
}






else  
{
	echo "帳號或密碼錯誤 請重新登入";
	echo "<meta http-equiv='refresh' content='20; url=homepage.html'>";
}



}

?>
