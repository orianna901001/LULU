<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>歡迎登入</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" ></a>
                <font color="white">
                <marquee direction="right" height="30" scrollamount="2" behavior="alternate">歡迎來到LULU寵物旅館後台數據管理庫</marquee></font>
                <marquee direction="right" height="30" scrollamount="5" behavior="alternate">隱藏跑跑跑</marquee>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header - set the background image for the header in the line below-->
        <header class="py-5 bg-image-full" style="background-image: url('https://source.unsplash.com/wfh8dDlNFOk/1600x900')">
            <div class="text-center my-5">
                <img class="img-fluid rounded-circle mb-4" src="https://tse2.mm.bing.net/th?id=OIP.mEf3cD-iJCyRTurNrQ1v6QHaHL&pid=Api&P=0&w=165&h=160" alt="..." />
                <h1 class="text-white fs-3 fw-bolder">(灬ºωº灬)</h1>
                <p class="text-white-50 mb-0">歡迎登入</p><a href=logout.php>登出</a>
            </div>
        </header>
        
<br>
<?php
session_start();
include('connect.php');




$id=$_SESSION['id'];
$auth= $_SESSION['auth'];

if($auth =='')
{
   echo "無權限!!請重新登入";
   echo "<meta http-equiv='refresh' content='2; url=index.php'>";
   exit; 
}

echo $id."  你好啊";
?>
<hr> 

<?php
if($auth =='admin')
{
?>
<table border=1 class="table table-striped">
  <thead>
  <tr>
    <th>尊貴會員</th>
    <th>帳號</th>
    <th>姓名</th>
    <th>常用信箱</th>
    <th>連絡電話</th>
    <th>何種管道</th>
  </tr>
   <thead>
 <tbody>
<?php
$s = mysqli_query($conn, "SELECT * From member");
   while ($r= mysqli_fetch_array($s))

   { 
      echo "<form action=review.php method=post>"; 
      echo "<tr><td>" .$r['pw']."</td><td>" .$r['id']."</td><td>" .$r['name']."</td><td>" .$r['email']."</td><td>"
.$r['phone']."</td><td>".$r['way']."</td>";

if($r['active']=='0')
{
echo "<td><input type=hidden name=no value=".$r['no'].">";
echo "<input type=submit name=bt value=啟用></td>";
}else{
echo "<td><input type=hidden name=no value=".$r['no'].">";
echo "<input type=submit name=bt value=停用></td>";


}

echo "</tr></form>";


}
?>
</tbody>
</table>





<br><br>





<form action=select.php method=post>
   查詢
   <input type=text name=owner size=10 placeholder="請輸入飼主名子">
   <input type=submit name=bt value=查詢>
   <br>  <br>  
   <p>
   新增
   <input type=text name=owner size=5 placeholder="飼主名稱">
   <input type=text name=name size=5 placeholder="狗狗名稱">
   <input type=text name=age size=5 placeholder="年紀">
   <input type=text name=sex size=5 placeholder="性別">
   <input type=text name=weighted size=5 placeholder="體重">
   <input type=text name=interesting size=10 placeholder="興趣">
   <input type=text name=date size=10 placeholder="日期">
   <input type=text name=total size=5 placeholder="金額">
   <input type=submit name=bt value=新增>
 </form>

<?php
}
?>

 <hr> 


<table border=1 class="table table-striped">
  <thead>
	<tr>
		 <th>飼主名稱</th>
		 <th>狗狗名稱</th>
		 <th>年紀</th>
		 <th>性別</th>
		 <th>體重</th>
		 <th>興趣</th>
       <th>日期</th>
       <th>金額</th>
	</tr>
  </thead>

  <tbody>

<?php
if ($auth =='admin')
{

   $s = mysqli_query($conn, "SELECT * From exam3 ORDER BY owner DESC");
   while ($r= mysqli_fetch_array($s))

   { 
      echo "<form action=select.php method=post>"; 
     echo "<tr><td>".$r['owner']."</td>  <td>".$r['name']."</td>  <td>".$r['age']."</td>  <td>".$r['sex']."</td> <td>".$r['weighted']."</td>   <td>".$r['interesting']."</td>  <td>".$r['date']."</td> <td>".$r['total']."</td>";

echo "<td><input type=hidden name=owner value=".$r['owner']."><input type=submit name=bt value=刪除>";
echo "<input type=submit name=bt value=編輯></td></tr>";
echo "</form>";

}
   }		 
else
{
    $s = mysqli_query($conn,"SELECT exam3.`owner`,exam3.`name`,exam3.age,exam3.sex,exam3.weighted,exam3.interesting,exam3.date,exam3.total FROM member INNER JOIN exam3 ON  member. `name`=exam3. `owner` WHERE id='$id'");
    $r = mysqli_fetch_array($s);
         echo "<tr><td>".$r['owner']."</td>  <td>".$r['name']."</td>  <td>".$r['age']."</td>  <td>".$r['sex']."</td> <td>".$r['weighted']."</td>   <td>".$r['interesting']."</td>  <td>".$r['date']."</td> <td>".$r['total']."</td></tr>";



}
?>
</tbody>
</table>




<br><br>




<img src=https://chart.apis.google.com/chart?chtt=%E8%B2%93%E5%92%AA%E5%93%81%E7%A8%AE&chm=N,000000,0,-1,15&cht=bhg&chs=640x280&chds=a&chd=t:1,4,8,4,7,3,17&chxt=x,y&chg=16.7,20&chxl=1:|%E5%A1%9E%E7%88%BE%E5%87%B1%E5%85%8B%E6%8D%B2%E6%AF%9B%E8%B2%93|%E5%8A%A0%E6%8B%BF%E5%A4%A7%E7%84%A1%E6%AF%9B%E8%B2%93|%E7%B7%AC%E5%9B%A0%E8%B2%93|%E5%AE%B6%E8%B2%93|%E7%BE%8E%E5%9C%8B%E7%9F%AD%E6%AF%9B%E8%B2%93|%E7%86%B1%E5%B8%B6%E8%8D%89%E5%8E%9F%E8%B2%93|%E8%B1%B9%E8%B2%93&chbh=20&chma=100&chco=FFC6A5&chts=000000,30,c&>


<img src=https://chart.apis.google.com/chart?chtt=%E7%8B%97%E7%8B%97%E5%93%81%E7%A8%AE&chm=N,000000,0,-1,15&cht=bhg&chs=640x280&chds=a&chd=t:12,4,18,4,37,32,17&chxt=x,y&chg=16.7,20&chxl=1:|%E8%B2%B4%E8%B3%93%E7%8B%97|%E5%8D%9A%E7%BE%8E|%E5%93%88%E5%A3%AB%E5%A5%87|%E9%82%8A%E5%A2%83%E7%89%A7%E7%BE%8A%E7%8A%AC|%E6%9F%B4%E7%8A%AC|%E9%AC%86%E7%8D%85%E7%8A%AC|%E7%B1%B3%E5%85%8B%E6%96%AF&chbh=20&chma=100&chco=FFC6A5&chts=000000,30,c&>






</table>		 