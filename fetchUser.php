<?php
global $conn;
$conn = pg_connect(
        "host=ec2-54-228-250-82.eu-west-1.compute.amazonaws.com "
        . "port=5432 "
        . "dbname=d3mmt1g6shtb1m "
        . "user=xoltwrkzmqvqnb "
        . "password=d7d473617a74af703df4e54fdfad91844a72baf99c9a1e9e79ad2ef9e9c19cc4");

pg_set_client_encoding($conn, "utf8");

if (isset($_GET['id_'])) {
    $id = $_GET['id_'];
    $sql = "SELECT * FROM user_ WHERE user_id=$id";
    $arr = pg_query($conn, $sql);
    $arr = pg_fetch_assoc($arr);
    echo json_encode($arr);
}
else echo -1;
