<?php
putenv('LANG=UTF-8');
date_default_timezone_set('Europe/Moscow');
setlocale(LC_CTYPE, 'ru_RU.UTF-8');
mb_internal_encoding('UTF-8');


$host = "localhost";
$user = "postgres";
$pass = "3095";
$db = "uniexpress-service";


$db_S = "uniexpress_spb";

// open a connection to the database server
$connection = pg_connect ("host=$host dbname=$db user=$user password=$pass");

pg_set_client_encoding($connection, "UTF-8");

if (!$connection)
{
die("Could not open connection to database server");
}


// open a connection to the database server
$connection_S = pg_connect ("host=$host dbname=$db_S user=$user password=$pass");

if (!$connection_S)
{
die("Could not open connection to database server");
}

?>
