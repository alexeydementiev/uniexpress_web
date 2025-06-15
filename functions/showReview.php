<?php


$host = "localhost";
$user = "postgres";
$pass = "3095";
$db = "uniexpress-service";

$connection = pg_connect("host=$host dbname=$db user=$user password=$pass");

  $nextR = $_POST['nextR'];
  
  $q="select * from _reference6242 WHERE _code='$nextR'";
  $r = pg_query($connection, $q);
  $f=pg_fetch_array($r); 


$cont[1] = $f[_fld6246];
$cont[2] = "url(../images/slider-customers/".$f[_fld6249].")";
$cont[3] = $f[_fld6250];
$cont[4] = $f[_fld6251];
$cont[5] = "<a href='$f[_fld6247]' target='_blank'>$f[_fld6252]</a>";

echo json_encode($cont);
exit();

?>