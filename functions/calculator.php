<?php


$host = "localhost";
$user = "postgres";
$pass = "3095";
$db = "uniexpress_msk";
$db_S = "uniexpress_spb";

$connection = pg_connect ("host=$host dbname=$db user=$user password=$pass");
$connection_S = pg_connect ("host=$host dbname=$db_S user=$user password=$pass");
 
$service=$_POST['service'];
$city=$_POST['city'];
$loc=$_POST['loc'];
$kmzaMKAD=$_POST['kmzaMKAD'];
$weight=$_POST['weight'];




//service="+service+"&city="+city+"&location="+location,
if ($city=="MSK") 
{
	if ($service=="delivery") 
	{
		if ($loc == "inCity")
		{
		    if ($weight<=0.5) {  $code = "501";  }
			elseif ($weight<=3) {  $code = "502";  }
			elseif ($weight<=5) {  $code = "503";  }
			elseif ($weight<=10) {  $code = "504";  }
			elseif ($weight<=15) {  $code = "505";  }
			elseif ($weight<=20) {  $code = "506";  }
			else {  $code = "506"; }
			
		}
		if ($loc == "5km") {   $code = "538"; }
		if ($loc == "10km") {  $code = "539"; }
		if ($loc == "more10km") {  $code = "552"; }
	
	$q2="select * from _reference300 WHERE _code='$code'";
	$r2 = pg_query($connection, $q2);
	$f2=pg_fetch_array($r2);
	$tarif = str_replace('.00', '', $f2[_fld308]);	 
	
	}
	if ($service=="sam") 
	{
		$q2="select * from _reference5482 WHERE _code='$loc'";
		$r2 = pg_query($connection, $q2);
		$f2=pg_fetch_array($r2);
		
		if ($weight <= 5) 
		{ 	$tarif = str_replace('.00', '', $f2[_fld5504]);  }  
		elseif ($weight <= 10) 
		{ 	$tarif = str_replace('.00', '', $f2[_fld5505]);  }
		elseif ($weight <= 20) 
		{ 	$tarif = str_replace('.00', '', $f2[_fld5506]);  }
		else
		{
			$tarif = str_replace('.00', '', $f2[_fld5506]);
			$atarif = str_replace('.00', '', $f2[_fld5507]);
			$W = $weight-20; $add=0;
			while($W>0)
			{
		   		$add = $add+$atarif;
		   		$W=$W-5;	  
		   }
		   $tarif = $tarif+$add;
		}
	}
	
}	

if($city=="SPB")
{
	if ($service=="delivery") 
	{
		if ($loc == "inCity")
		{
		    if ($weight<=0.5) {  $code = "501";  }
			elseif ($weight<=3) {  $code = "502";  }
			elseif ($weight<=5) {  $code = "503";  }
			elseif ($weight<=10) {  $code = "504";  }
			elseif ($weight<=15) {  $code = "505";  }
			elseif ($weight<=20) {  $code = "506";  }
			else {  $code = "506"; }
			
		}
		if ($loc == "5km") {   $code = "538"; }
		if ($loc == "10km") {  $code = "539"; }
		if ($loc == "more10km") {  $code = "552"; }
	
	$q2="select * from _reference300 WHERE _code='$code'";
	$r2 = pg_query($connection, $q2);
	$f2=pg_fetch_array($r2);
	$tarif = str_replace('.00', '', $f2[_fld308]);	 
	
	}
	if ($service=="sam") 
	{
		$q2="select * from _reference5454 WHERE _code='$loc'";
		$r2 = pg_query($connection_S, $q2);
		$f2=pg_fetch_array($r2);
		
		if ($weight <= 5) 
		{ 	$tarif = str_replace('.00', '', $f2[_fld5481]);  }  
		elseif ($weight <= 10) 
		{ 	$tarif = str_replace('.00', '', $f2[_fld5482]);  }
		elseif ($weight <= 20) 
		{ 	$tarif = str_replace('.00', '', $f2[_fld5483]);  }
		else
		{
			$tarif = str_replace('.00', '', $f2[_fld5483]);
			$atarif = str_replace('.00', '', $f2[_fld5484]);
			$W = $weight-20; $add=0;
			while($W>0)
			{
		   		$add = $add+$atarif;
		   		$W=$W-5;	  
		   }
		   $tarif = $tarif+$add;
		}
	}
}
	



if (($service=="delivery") AND ($loc == "inCity") AND ($weight>20))
 	{ 
		$qW20="select * from _reference300 WHERE _code='537'";
		$rW20 = pg_query($connection, $qW20);
		$fW20=pg_fetch_array($rW20);
		$atarif = str_replace('.00', '', $fW20[_fld308]);	
		$W = $weight-20; $add=0;
		while($W>0)
		{
		   $add = $add+$atarif;
		   $W=$W-5;	  
		}
		$tarif = $tarif+$add;
		
	}
	
if (($service=="delivery") AND (($loc == "5km") OR ($loc == "10km") OR ($loc == "more10km")) AND ($weight>5))
 	{ 
		$qW20="select * from _reference300 WHERE _code='551'";
		$rW20 = pg_query($connection, $qW20);
		$fW20=pg_fetch_array($rW20);
		$atarif = str_replace('.00', '', $fW20[_fld308]);	
		$W = $weight-5; $add=0;
		while($W>0)
		{
		   $add = $add+$atarif;
		   $W=$W-5;	  
		}
		$tarif = $tarif+$add;
		
	}	

if (($service=="delivery") AND ($loc == "more10km"))
{
	    $qm10km="select * from _reference300 WHERE _code='550'";
		$rm10km = pg_query($connection, $qm10km);
		$fm10km=pg_fetch_array($rm10km);
		$atariff=$kmzaMKAD*str_replace('.00', '', $fm10km[_fld308]);
		$tarif = $tarif+$atariff;
}

//$tarif = $weight;


echo json_encode($tarif);
exit();

?>