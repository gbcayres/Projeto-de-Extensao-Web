<?php

include("conexao.php");

function logar($conn, $username, $pass) {
  $query = "SELECT * FROM users WHERE username = ?";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, 's', $username);
  mysqli_stmt_execute($stmt);

  $result = mysqli_stmt_get_result($stmt);
  if($result) {
    $user = mysqli_fetch_assoc($result);

    if($user && password_verify($pass, $user["pass"])) {
      echo '<p class="logado">Login efetuado com sucesso.</p>';
      criaSessao($username);
    } else {
      echo '<p class="erro">Falha na autenticação.</p>';
    }
  } else {
    error_log("Erro na consulta: " . mysqli_error($conn));
    echo "Erro no login.";
  }
}

function autenticarInputs($username, $pass) {
  if(empty($username)) {
    return '<p class="erro">Informe seu usuário</p>';
  } else if(empty($pass)) {
    return  '<p class="erro">Informe sua senha</p>';
  }

  return null;
}

function criaSessao($username) {
  if(!isset($_SESSION)) {
    session_start();
    $_SESSION["username"] = $username;

    header("Location: index.php");
  }
}