<?php
// Pegando o arquivo para conectar no banco de dados
require_once("../database/conn.php");

// Verificando se recebeu matricula, nome, setor, data de admissão via form:post
// Se recebeu continua
// Se não recebeu, mostra um erro e um link para a pagina home
if (isset($_POST['addMatricula'], $_POST['addNome'], $_POST['addSetor'], $_POST['addDt_admissao'])) {
  // Criando as variáveis com os valores recebidos via form:post
  $matricula = $_POST['addMatricula'];
  $nome = $_POST['addNome'];
  $setor = $_POST['addSetor'];
  $dt_admisso = $_POST['addDt_admissao'];

  // Criando um query para verificar se existe esse usuario na tabela de funcionário
  // passando o nome para comparar
  $query_select = "SELECT NOME FROM funcionarios WHERE nome='$nome'";

  // Enviando a query para banco de dados e retornando o resultado em uma variável 
  $resultado = $conn->query($query_select);

  // Verificando se existe esse usuario na tabela de funcionarios
  // Se não existe continua
  // Se existe, mostra um erro e um link para a pagina home
  if ($resultado->num_rows === 0) {
    // Criando um query para inserir um dado na tabela de funcionarios
    // com os valores de matricula, nome, setor, data de admissão
    $query_insert = "INSERT INTO funcionarios(NR_MATRICULA, NOME, CD_FK_SETOR, DT_ADMISSAO)
    VALUES($matricula, '$nome', $setor, '$dt_admisso')";
    
    // Verificando se a query deu certo no banco de dados
    // Se deu certo redireciona para a pagina home
    // Se não, mostra um erro e um link para a pagina home
    if ($conn->query($query_insert)) {
      header('Location: ../pages/home');
    } else {
      echo "<div>
        <p>$conn->error</p>
        <a href='../pages/home'>Voltar</a>
      </div>";
    }
  } else {
    echo "<div>
        <p>Funcionario Duplicado</p>
        <a href='../pages/home'>Voltar</a>
      </div>";
  }
} else {
  echo "<div>
      <p>Parâmetros incorretos</p>
      <a href='../pages/home'>Voltar</a>
    </div>";
}
