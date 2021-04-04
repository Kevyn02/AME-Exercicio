<?php
// Pegando o arquivo para conectar no banco de dados
require_once('../database/conn.php');

// Verificando se recebeu nome e senha via form:post
// Se recebeu continua
// Se não recebeu, mostra um erro e um link para a página de login
if (isset($_POST['name'], $_POST['password'])) {
  // Criando as variáveis com os valores em maiúsculo recebidos via form:post
  $name = strtoupper($_POST['name']);
  $password = strtoupper($_POST['password']);

  // Criando um query para verificar se existe esse usuario na tabela de usuarios
  // passando o nome e senha para comparar
  $query_select = "SELECT USER, NM_USUARIO, TP_USUARIO FROM usuarios WHERE USER = '$name' && NM_USUARIO = '$password'";

  // Enviando a query para banco de dados e retornando o resultado em uma variável 
  $resultado = $conn->query($query_select);

  // Verificando se existe o usuario
  // Se existe e é igual no banco inicia uma sessão, 
  // salva o valor do tipo de usuario (administrador ou não)
  // e redireciona para a página home
  // Se não mostra um erro e um link para voltar
  if ($resultado->num_rows === 1) {
    $row = $resultado->fetch_assoc();
    session_start();
    $_SESSION['admin'] = $row['TP_USUARIO'];
    header('Location: ../pages/home');
  } else {
    echo "<div>
      <p>Usuário e/ou senha incorreto</p>
      <a href='../pages'>Voltar</a>
    </div>";
  }
} else {
  echo "<div>
    <p>Parâmetros incorretos</p>
    <a href='../pages'>Voltar</a>
  </div>";
}
