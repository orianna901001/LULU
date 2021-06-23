<?php

// 資料庫連線訊息
$DBhost = "127.0.0.1"; 	//主機
$DBname = "ncu109102516";	//資料庫
$DBuser = "ncu109102516";	//帳號
$DBpw = "ncu109102516";		//密碼

// 連線至主機
$conn = mysqli_connect( $DBhost, $DBuser, $DBpw);
if (empty($conn)){
  print mysqli_error($conn);
  die ("主機無法連線");
  exit;
}

// 選擇資料庫
if( !mysqli_select_db($conn, $DBname)) {
  die ("資料庫無法選擇");
}

// 設定連線編碼
mysqli_query( $conn, "SET NAMES 'utf8'");


?>
