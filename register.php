<?php
global $conn;
$conn = pg_connect(
        "host=ec2-54-228-250-82.eu-west-1.compute.amazonaws.com "
        . "port=5432 "
        . "dbname=d3mmt1g6shtb1m "
        . "user=xoltwrkzmqvqnb "
        . "password=d7d473617a74af703df4e54fdfad91844a72baf99c9a1e9e79ad2ef9e9c19cc4");
pg_set_client_encoding($conn, "utf8");
$email = $_GET['email'];

$sql = "SELECT CASE
        WHEN EXISTS (SELECT 1
          FROM user_
          WHERE email = '$email') THEN 'exists'
        ELSE NULL END";

$res = pg_query($conn, $sql);
if (!$res) { //запрос о существовании логина выполнен неудачно -> вернуть ошибку
    echo -1;
    die();
}

$r = pg_field_is_null($res, "case");
if ($r) {
    //поля нет -> вставить
    $res = pg_insert($conn, 'user_', $_GET);
    if ($res) {
        //вставка выполнена успешно -> вернуть индекс 
        $sql = "SELECT user_id FROM user_ WHERE email='$email'";
        $res = pg_query($conn, $sql);
        $id = pg_fetch_result($res, 0, 0);
        echo $id;
    } else {
        // вставка не удалась -> вернуть ошибку
        echo -1;
    }    
}
else {
    //поле есть -> вернуть сообщение о существовании пользователя
    echo -2;
}
?>
 


