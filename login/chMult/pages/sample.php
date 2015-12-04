

<?php
$linkid=mysql_connect('localhost','root','')or die("Couldnot connect");


$result = mysql_query("SELECT count(UserId) FROM users");
$row = mysql_fetch_array($result);

$total = $row[0];
echo "Total rows: " . $total;

//mysql_close($con);
?>

