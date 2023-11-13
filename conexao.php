<?php
  function connectDB() {

    $dbHost = 'localhost';
    $dbUser = 'root';
    $dbPass = '';
    $dbName = 'login';

    $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

    if ($conn->connect_error) {
      die('A conexão falhou: ' . $conn->connect_error);
    }
    return $conn;
  }

  $conn = connectDB();
?>
