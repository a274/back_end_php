<?php
global $conn;
$conn = pg_connect(
        "host=ec2-54-228-250-82.eu-west-1.compute.amazonaws.com "
        . "port=5432 "
        . "dbname=d3mmt1g6shtb1m "
        . "user=xoltwrkzmqvqnb "
        . "password=d7d473617a74af703df4e54fdfad91844a72baf99c9a1e9e79ad2ef9e9c19cc4");

pg_set_client_encoding($conn, "utf8");

$login = $_GET['login'];
$password = $_GET['password'];

$sql = "SELECT CASE
        WHEN EXISTS (SELECT 1
          FROM user_
          WHERE email = '$login') THEN 'exists'
        ELSE NULL END";

$res = pg_query($conn, $sql);
if (!$res) { //запрос о существовании логина выполнен неудачно -> вернуть ошибку
    echo -1;
    die();
}

$r = pg_field_is_null($res, "case");

if (!$r) {
    $sql = "SELECT password_ FROM user_ WHERE email='$login'";
    $pass = pg_query($conn, $sql);
    $pass = pg_fetch_result($pass, 0, 0);

    
    if ($pass == $password) {
        $sql = "SELECT user_id FROM user_ WHERE email='$login'";
        $res = pg_query($conn, $sql);
        $id = pg_fetch_result($res, 0, 0);
        echo $id;
    } 
    else echo 0;
}
else echo -1;

