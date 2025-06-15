<?php
$host = "localhost";
$user = "postgres";
$pass = "3095";
$db = "uniexpress-service";

$connection = pg_connect("host=$host dbname=$db user=$user password=$pass");
  $nextR = $_POST['nextR'];

$cont = [];

try {
    // Проверка подключения
    if (!$connection) {
        throw new Exception("Нет подключения к базе данных.");
    }

    // Получение параметра
    if (!isset($_POST['nextR'])) {
        throw new Exception("Параметр 'nextR' не передан.");
    }

    $nextR = pg_escape_string($connection, $_POST['nextR']);

    // Запрос
    $q = "SELECT * FROM _reference6242 WHERE _code = '$nextR'";
    $r = pg_query($connection, $q);

    if (!$r) {
        throw new Exception("Ошибка запроса: " . pg_last_error($connection));
    }

    $f = pg_fetch_array($r);
    if (!$f) {
        throw new Exception("Нет данных по коду '$nextR'.");
    }

    // Заполнение результата
    $cont[1] = $f['_fld6246'];
    $cont[2] = "url(../images/slider-customers/" . $f['_fld6249'] . ")";
    $cont[3] = $f['_fld6250'];
    $cont[4] = $f['_fld6251'];
    $cont[5] = "<a href='" . $f['_fld6247'] . "' target='_blank'>" . $f['_fld6252'] . "</a>";
} catch (Exception $e) {
    // Ошибку пишем в элемент массива вместо данных
    $cont[3] = "Ошибка: " . $e->getMessage();
}

echo json_encode($cont);
exit();
?>