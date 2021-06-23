<?php
include "connect.php";
$s= mysqli_query($conn,"SELECT *FROM exam4 ORDER BY on ASC");
while ($r=mysqli_fetch_array($s))

{
   $feeling[]= $r['feeling'];
   $num[]= $r['num'];


}

$num_string =implode("," ,$feeling);
$date_string =implode("|" ,$num);
?>

<img scr=http://chart.apis.google.com/
chart?chtt=顧客滿意表&chm=N,FF0000,0,-1,15&cht=lc&chs=800x350&chds=a&chd=t:1,2,3,4,5&chxt=x,y&chg=16,7,23&chxl=0:|6/1|