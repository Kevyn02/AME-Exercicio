<?php
// Pegando o arquivo para conectar no banco de dados
require_once("../database/conn.php");

// Verificando se recebeu matricula e setor via form:post
// Se recebeu continua
// Se não recebeu, mostra um erro e um link para a pagina home
if (isset($_POST['editMatricula'], $_POST['editSetor'])) {
  // Criando as variáveis com os valores recebidos via form:post
  $matricula = $_POST['editMatricula'];
  $setor = $_POST['editSetor'];

  // Criando um query para verificar se existe esse usuario na tabela de funcionarios
  // passando matricula para comparar
  $query_select = "SELECT NR_MATRICULA FROM funcionarios WHERE NR_MATRICULA = $matricula";

  // Enviando a query para banco de dados e retornando o resultado em uma variável 
  $resultado = $conn->query($query_select);

  // Verificando se existe esse usuario na tabela de funcionarios
  // Se existe continua
  // Se não existe, mostra um erro e um link para a pagina home
  if ($resultado->num_rows === 1) {
    // Criando um query para atualizar o id do setor desse usuario na tabela de funcionarios
    // passando matricula para encontrar
    $query_update = "UPDATE funcionarios SET CD_FK_SETOR = $setor
      WHERE NR_MATRICULA = $matricula";

    // Verificando se a query deu certo no banco de dados
    // Se deu certo redireciona para a pagina home
    // Se não, mostra um erro e um link para a pagina home
    if ($conn->query($query_update)) {
      header('Location: ../pages/home');
    } else {
      echo "<div>
         <p>$conn->error</p>
         <a href='../pages/home'>Voltar</a>
       </div>";
    }
  } else {
    echo "<div>
         <p>Funcionário não existe</p>
         <a href='../pages/home'>Voltar</a>
       </div>";
  }
} else {
  echo "<div>
      <p>Parâmetros incorretos</p>
      <a href='../pages/home'>Voltar</a>
    </div>";
}
