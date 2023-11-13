<?php

  if(!isset($_SESSION)) {
    session_start();
  }


  if(!isset($_SESSION["username"])) {
    die('<h1>Voce precisar logar para acessar a página.<a href="telalogin.php">Entrar');
  }
?>