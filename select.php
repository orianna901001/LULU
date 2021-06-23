<?php
include('connect.php'); //引入"連結資料庫"程式




//只要有資料藉由輸入框使用mysqli_real_escape_string函式 移除可能干擾資料庫操作的字符
$bt = mysqli_real_escape_string($conn,$_POST['bt']);
$owner = mysqli_real_escape_string($conn,$_POST['owner']);

if($bt == '查詢')
{
	$s = mysqli_query($conn,"SELECT * FROM exam3 WHERE owner = '$owner'"); //執行"資料庫查詢"
	$r = mysqli_fetch_array($s); //獲取一個"查詢結果"
	
	echo $r['owner']." 狗狗名子:".$r['name']." 年紀:".$r['age']." 性別:".$r['sex']." 體重:" .$r['weighted']. "興趣:" .$r['interesting']. "日期:" .$r['date']. " 金額:" .$r['total'];
	
	echo "<br><a href=score.php>回前頁</a>"; //使用超連結方式 回score.php
}





elseif($bt == '新增')
{


$name = mysqli_real_escape_string($conn,$_POST['name']);
$age = mysqli_real_escape_string($conn,$_POST['age']);
$sex = mysqli_real_escape_string($conn,$_POST['sex']);
$weighted = mysqli_real_escape_string($conn,$_POST['weighted']);
$interesting = mysqli_real_escape_string($conn,$_POST['interesting']);
$date = mysqli_real_escape_string($conn,$_POST['date']);
$total = mysqli_real_escape_string($conn,$_POST['total']);


	$s = mysqli_query($conn,"INSERT INTO exam3 (owner, name, age,sex, weighted, interesting,date,total) VALUES ($owner $name, $age, $sex, $weighted, $interesting, $date, $total"); //執行"資料庫新增"
	if($s)
	{
		echo "新增成功";
		echo "<meta http-equiv='refresh' content='2; url=score.php'>"; //等待2秒後 自動導向score.php
	}
	else
	{
		echo "新增失敗";
		echo "<meta http-equiv='refresh' content='2; url=score.php'>"; //等待2秒後 自動導向score.php
	}
}




elseif ($bt == '刪除'){

$s = mysqli_query($conn, "DELETE FROM exam3 WHERE owner ='$owner'" ); 
if($s)

{
    echo "刪除成功";
    echo"<meta http-equiv='refresh' content='2; url=score.php'>";
}

else 
{
  echo"新增失敗";
  echo"<meta http-equiv='refresh' content='2; url=score.php'>";
}


}






elseif($bt == '編輯')
{
    $s = mysqli_query($conn,"SELECT * FROM exam3 WHERE owner = '$owner'"); //執行"資料庫查詢"
	$r = mysqli_fetch_array($s); //獲取一個"查詢結果"

	echo '<form action=edit.php method=post onSubmit="return confirm(\'你確定嗎\')">';
    echo $r['owner']."<br>";
    echo  "狗狗名子<input type=text name=name size=5 value=".$r['name']."><br>";
    echo "年紀 <input type=text name=age size=5 value=".$r['age']."><br>";
    echo "性別 <input type=text name=sex size=5 value=".$r['sex']."><br>";
    echo "體重 <input type=text name=weighted size=5 value=".$r['weighted']."><br>";
    echo "興趣 <input type=text name=interesting size=5 value=".$r['interesting']."><br>";
    echo "日期 <input type=text name=date size=5 value=".$r['date']."><br>";
    echo "金額 <input type=text name=total size=5 value=".$r['total']."><br>";
    echo  "<input type=hidden name=owner  value=".$r['owner']."><input type=submit value=編輯>";
    echo "</form>";
    





}


?>