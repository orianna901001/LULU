<?php
include('connect.php');

echo $owner= $_POST['owner'];
echo $name=$_POST['name'];
echo $sex=$_POST['sex'];
echo $age=$_POST['age'];
echo $weighted=$_POST['weighted'];
echo $interesting=$_POST['interesting'];
echo $date=$_POST['date'];
echo $total=$_POST['total'];





   
$s = mysqli_query($conn,"UPDATE exam3 SET name ='$name' Where owner='$owner'");


if($s)
{
	echo "更新成功";
	echo "<meta http-equiv='refresh' content='2; url=score.php'>";

}
else
{
	echo "更新失敗";
	echo "<meta http-equiv='refresh' content='2; url=score.php'>";


}


?>