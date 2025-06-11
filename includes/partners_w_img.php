
<table width='100%' cellspacing='0px' cellpadding='0px' class='maintext2'>


<?php

$host = "localhost";
$user = "postgres";
$pass = "3095";
$db = "uniexpress";



// open a connection to the database server
$connection = pg_connect ("host=$host dbname=$db user=$user password=$pass");
if (!$connection)
{
die("Could not open connection to database server");
}


$q2="select * from _reference192 WHERE _fld5233='t' AND _fld5228<>'' ORDER BY _code";
$r2 = pg_query($connection, $q2) or die("Error in query: $q2." . pg_last_error($connection));
$rows2 = pg_num_rows($r2);
 for($i3=0; $i3<$rows2; $i3++)
 {
  $f2=pg_fetch_array($r2);
  $src_logo = "https://p.shipperty.ru/images/logos/".$f2['_code']."/".$f2['_fld5228'];
  if (file_exists($src_logo)) {
      $img_logo_param = getimagesize($src_logo) ?? array();
      $nim = $f2['_fld5229'] ?? "";
      $subs = $f2['_fld5230'] ?? "";
      if ($img_logo_param[0] > 180) {
          $smaled = "...";
          $wid = "180px";


      } else {
          $wid = $img_logo_param[0];

      }
  }

   $pos = strpos($f2['_fld5231'], 'http');
if ($pos === false )
{ $lnk = 'http://'.$f2['_fld5231']; } else  { $lnk = $f2['_fld5231']; }
  echo "
  <tr>
                <td valign='middle' align='rignt' width='25px'></td>
                <td valign='top'>
                <div class='mainText'>
                <a href='$lnk' target='_blank' class='mainText'>
                <b>$nim</b></a>
                <br>
                 $subs
                 </div>

                </td>
                <td valign='top' align='center' width='200px'>
                 <a href='$lnk' target='_blank'>
                  <img src='$src_logo' width='$wid'>
                 </a>
                </td>
               </tr>
                <tr><td>&nbsp;</td></tr>

                ";


 }
?>

</table>
<p>&nbsp;</p>

<table width='100%' cellspacing='0px' cellpadding='0px' class='maintext2'>


                <tr>
                <td valign='middle' align='rignt' width='25px'></td>
                <td valign='top'>
                <div class='mainText'>

<?php

$q2="select * from _reference192 WHERE _fld5233='t' AND _fld5228='' ORDER BY _code";
$r2 = pg_query($connection, $q2) or die("Error in query: $q2." . pg_last_error($connection));
$rows2 = pg_num_rows($r2);
 for($i3=0; $i3<$rows2; $i3++)
 {
  $f2=pg_fetch_array($r2);

   $nim= $f2['_fld5229'];
   $subs= $f2['_fld5230'];

   $pos = strpos($f2['_fld5231'], 'http');
if ($pos === false )
{ $lnk = 'http://'.$f2['_fld5231']; } else  { $lnk = $f2['_fld5231']; }

  echo "<a href='$lnk' target='_blank' class='mainText'><b>$nim</b> $subs</a><br>&nbsp;<br>";


 }
?>


                  </div>
                </td>
                <td valign='top' align='center' width='10px'>&nbsp;                </td>
               </tr>
</table>