<?php

include('connect.php'); //引入"連結資料庫"程式


$s = mysqli_query($conn,"SELECT * FROM exam3"); //執行"資料庫查詢"
$r = mysqli_fetch_array($s); //獲取一個"查詢結果"
echo $r['name']."<br><br>";


$s = mysqli_query($conn,"SELECT * FROM exam3"); //執行"資料庫查詢"
while($r = mysqli_fetch_array($s)) //獲取所有"查詢結果"
{
	echo $r['owner']."<br>";
	echo $r['name']."<br>";
	echo $r['age']."<br>";
	echo $r['sex']."<br>";
	echo $r['weighted']."<br>";
	echo $r['interesting']."<br>";
	echo $r['date']."<br>";
	echo $r['total']."<br>";
}
?>

