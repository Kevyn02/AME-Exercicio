<?php
// Continua uma sessão existente
session_start();
// Verifica se existe um valor de admin na sessão ao logar
// Se não existe redireciona para a pagina de login
if (!isset($_SESSION['admin'])) {
  header('Location: ../');
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
  <link rel="shortcut icon" href="../../images/favicon.png" type="image/png" />
  <title>Home</title>
  <link rel="stylesheet" href="../../styles/global.css">
</head>

<body>
  <!-- Criando um contêiner para a pagina home -->
  <div id="home" class="container-fluid">
    <!-- Criando uma linha para o componente navbar -->
    <header class="row">
      <?php
      // Pegando o arquivo do componente navbar
      require("../../components/navbar.php");
      ?>
    </header>
    <!-- Criando uma linha para o componente tabela -->
    <main class="row px-2">
      <?php
      // Pegando o arquivo do componente tabela
      require("../../components/table.php");
      ?>
    </main>
    <?php
    // Verifica se o usuario é admin
    // Se for continua
    // Se não faz nada
    if ($_SESSION['admin']) {
      // Pegando o arquivo para conectar no banco de dados
      require("../../components/editModal.php");
      require("../../components/addModal.php");
    }
    ?>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script type="text/javascript" src="index.js"></script>
</body>

</html>