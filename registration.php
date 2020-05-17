<?php
global $conn;
$conn = pg_connect(
        "host=ec2-54-228-250-82.eu-west-1.compute.amazonaws.com "
        . "port=5432 "
        . "dbname=d3mmt1g6shtb1m "
        . "user=xoltwrkzmqvqnb "
        . "password=d7d473617a74af703df4e54fdfad91844a72baf99c9a1e9e79ad2ef9e9c19cc4");

pg_set_client_encoding($conn, "utf8");
        
$res = pg_insert($conn, 'user_', $_GET);
  if ($res) {
      echo json_encode($_GET);
  } else {
      echo null;
  }
?>