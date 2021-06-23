<?php
include('connect.php');
$id= mysqli_real_escape_string($conn,$_POST['id']);
$pw= mysqli_real_escape_string($conn,$_POST['pw']);
$name= mysqli_real_escape_string($conn,$_POST['name']);
$email= mysqli_real_escape_string($conn,$_POST['email']);
$phone= mysqli_real_escape_string($conn,$_POST['phone']);
$way= implode(".",$_POST['way']);

?>
<form action='ok.php' method="post">
請確認以下資訊是否正確<br>
帳號<input type=text name=id readonly=true value=<?php echo $id;?>><br>
密碼<input type=text name=pw readonly=true value=<?php echo $pw;?>><br>
姓名<input type=text name=name readonly=true value=<?php echo $name;?>><br>
Email<input type=text name=email readonly=true value=<?php echo $email;?>><br>
Phone<input type=text name=phone readonly=true value=<?php echo $phone;?>><br>
管道<input type=text name=way readonly=true value=<?php echo $way;?>><br>
<input type=submit>
</form>
