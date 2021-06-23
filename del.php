<?php
include ('connect.php');

$owner= $_POST['owner'];
$s= mysqli_query($conn,"DELECT FROM score WHERE owner = '$owner'");

if($s)

{
    echo "刪除成功";
    echo"<meta http-equiv='refresh' content='3; url=score.php'>";
}

else 
{
  echo"新增失敗";
  echo"<meta http-equiv='refresh' content='3; url=score.php'>";
}

?>
