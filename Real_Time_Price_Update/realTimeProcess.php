<?php

header("Content-Type:text/html; charset=utf-8");
header("Cache-Control:no-cache");

$cities = $_POST['city'];

$res = '[';
for ($i = 0; $i < count($cities); $i++) {
    if ($i == count($cities) - 1) {
        $res.='{"cityname":"' . $cities[$i] . '","price":"' . rand(500, 1500) . '"}]';
    } else {
        $res.='{"cityname":"' . $cities[$i] . '","price":"' . rand(500, 1500) . '"},';
    }
}
//file_put_contents("d:/mylog.log", $res . "\r\n", FILE_APPEND);

echo $res;
?>