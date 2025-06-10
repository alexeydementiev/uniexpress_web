<h2>Стратегические партнеры службы доставки UniExpress</h2>
<div>
<?php

$host = "localhost";
$user = "postgres";
$pass = "3095";
$db = "uniexpress";



// open a connection to the database server
$connection = pg_connect ("host=$host dbname=$db user=$user password=$pass");
    
  $q3="select * from _reference6241 WHERE _fld6245='t' ORDER BY _code";
  $r3 = pg_query($connection, $q3);
  $rows3= pg_num_rows($r3);
  for ($iS=0; $iS<$rows3; $iS++) 
  {
	  $f3=pg_fetch_array($r3);
	  echo "<a href='".$f3['_fld6244']."' target='_blank'><img src='images/logos/".$f3['_fld6243']."' alt='".$f3['_description']."'></a>";
	   
	  }
 //for($i3=0; $i3<$rows3; $i3++)
  //{
           //    $f3=pg_fetch_array($r3); 
         //      $pos = $i3*210;
             //  echo "<a href='".$f3[_fld6244]."' target='_blank'><div class='customers-block-slider-logo' id='customer_logo0".($i3+1)."' title='".$f3[_description]."'></div></a>";
 //}
       

?>
</div>