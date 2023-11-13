<?php
  include("login.php");

  if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST["username"]) && isset($_POST["pass"])) {
      $username = $_POST["username"];
      $pass = $_POST["pass"];

      $inputInvalido = autenticarInputs($username, $pass);

      if($inputInvalido) {
        echo $inputInvalido;
      } else {
        if(logar($conn, $username, $pass)) {
          criaSessao($username);
        }
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script defer>setTimeout(() => {
    alert("usuario e senha: admin");
  }, 500)</script>
  <link rel="stylesheet" href="assets/css/reset.css">
  <link rel="stylesheet" href="assets/css/login.css">
  <title>Login</title>
</head>
<body>
  <div class="container">
    <h1 class="container__title">Login</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" novalidate>
      <fieldset class="container__info">
        <div class="user-container">
          <div class="logo-container">
            <img src="assets/images/bxs-user.svg" alt="user-logo" class="logo">
          </div>
          <input type="text" id="inputUser" class="input" placeholder="Usuário" name="username" required>
        </div>
        <div class="pass-container">
          <div class="logo-container">
            <img src="assets/images/bxs-key.svg" alt="pass-logo" class="logo">
          </div>
          <input type="password" id="inputPass" class="input" placeholder="Senha" name="pass" required>
        </div>
      </fieldset>
      <button type="submit" name="submit" class="login-btn">Entrar</button>
    </form>
  </div>
</body>
</html>