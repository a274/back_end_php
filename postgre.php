<?php
include 'User.php';


global $conn;
$conn = pg_connect(
        "host=ec2-54-228-250-82.eu-west-1.compute.amazonaws.com "
        . "port=5432 "
        . "dbname=d3mmt1g6shtb1m "
        . "user=xoltwrkzmqvqnb "
        . "password=d7d473617a74af703df4e54fdfad91844a72baf99c9a1e9e79ad2ef9e9c19cc4");

pg_set_client_encoding($conn, "utf8");

function query($sql) {
    global $conn;
    $result = pg_query($conn, $sql);
    if (!$result) {
      echo "Произошла ошибка.\n".$sql;
      exit;
    }
      return $result;
}
/*      
function registration($name, $surname, $email, $password, $phonenumber, $adress) {
    global $conn;
    $registration = "INSERT INTO user VALUES ".
    "(NULL, $name, $surname, $email, $password, $phonenumber, $adress);";
    $result = pg_query($conn, $registration);
    if (!result) {
        echo "Произошла ошибка.\n";
        exit;
    }
}
*/

//$array = ["user_id" => NULL, 'name_' => 'ann', "surname" => "can", "email" => "aa@a", "password_" => "123", "phonenumber" => "123", "adress" => "assaasasassa"];

$res = pg_insert($conn, 'user_', $_GET);
/*
if ($res) {
      echo "Данные из POST успешно внесены в журнал\n";
  } else {
      echo "Пользователь прислал неверные данные\n";
  }


*/

?>