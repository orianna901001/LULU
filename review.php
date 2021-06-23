<?php
include('connect.php');

$no =$_POST['no'];
$bt =$_POST['bt'];

if($bt=='啟用')
	$s=mysqli_query($conn,"UPDATE member SET active='1' WHERE no = '$no'");
else
 $s=mysqli_query($conn,"UPDATE member SET active='0' WHERE no = '$no'");


 if($s)
 {
   echo"變更成功";
   echo"<meta http-equiv='refresh' content='2; url=score.php'>";
 }	
 else
 {
    echo"變更失敗";
    echo"<meta http-equiv='refresh' content='2; url=score.php'>";
 }	
 ?>