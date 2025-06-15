<?php
require_once __DIR__."/../includes/settings.php";

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