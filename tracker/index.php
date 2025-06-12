<?php
 ob_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
<?php require("../includes/head.php"); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Личный кабинет партнера службы доставки Shipperty</title>
</head>

<body>

<?php require("../includes/top.php");  ?>

<div id="main_div">

<h2>Список заказов – <?php echo date('Y-m-d H:i:s'); ?></h2>



<div id="main_block_03">
  <div id="main_block_h1">Настройки</div>
  <div id="main_block_link"><a href="settings.php">Общие настройки</a></div>
  <div id="main_block_link"><a href="settings.php#tabs-2">Рассылки и уведомления</a></div>
  <div id="main_block_link"><a href="settings.php#tabs-3">Логотипы и ссылка</a></div>
 </div>



<?php require("../includes/bottom.php"); ?>






</div>





</body>
</html>
