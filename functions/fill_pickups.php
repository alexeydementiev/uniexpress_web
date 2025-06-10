<?php

$host = "localhost";
$user = "postgres";
$pass = "3095";
$db = "uniexpress_msk";
$db_S = "uniexpress_spb";

$connection = pg_connect ("host=$host dbname=$db user=$user password=$pass");
$connection_S = pg_connect ("host=$host dbname=$db_S user=$user password=$pass");

$cont = "<select id='address_type' class='location-select' onChange='samChange();'>";


  /*           <option value='inCity' selected>Москва (в пределах МКАД)</option>
             <option value='5km'>Москва и МО (5 км за МКАД)</option>
             <option value='10km'>Москва и МО (10 км за МКАД)</option> 
             <option value='more10km'>Москва и МО (>10 км за МКАД)</option> 
     */     
//service="+service+"&city="+city+"&location="+location,
if ($city=="MSK") 
{
$q2="select * from _reference5482";
$r2 = pg_query($connection, $q2);

 $rows2 = pg_num_rows($r2);
 for($i3=0; $i3<$rows2; $i3++)
 {
  $f2=pg_fetch_array($r2);
  if ($f2[_code]=="1") {$selected = "selected";} else {$selected = "";} 
  $cont .= "<option value='$f2[_code]' $selected>Пункт &#8220;$f2[_description]&#8221;</option>";
 }
}	
if ($city=="SPB") 
{
$q2="select * from _reference5454";
$r2 = pg_query($connection_S, $q2);

 $rows2 = pg_num_rows($r2);
 for($i3=0; $i3<$rows2; $i3++)
 {
  $f2=pg_fetch_array($r2);
  if ($f2[_code]=="1") {$selected = "selected";} else {$selected = "";} 
  $cont .= "<option value='$f2[_code]' $selected>Пункт &#8220;$f2[_description]&#8221;</option>";
 }

	
}
	

$cont .= "</select>";


echo json_encode($cont);
exit();

?>