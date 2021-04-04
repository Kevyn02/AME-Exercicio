<?php
// Pegando o arquivo para conectar no banco de dados
require_once("../database/conn.php");

// Verificando se recebeu id do funcionário via get
// Se recebeu continua
// Se não recebeu, mostra um erro 
if (isset($_GET['cd_funcionario'])) {
  // Criando a variável com o valor recebido via get
  $cd_funcionario = $_GET['cd_funcionario'];

  // Criando um query para pegar um funcionário na tabela de funcionários
  // passando o id para comparar
  $query_select = "SELECT * FROM funcionarios WHERE CD_FUNCIONARIO = $cd_funcionario";

  // Enviando a query para banco de dados e retornando o resultado em uma variável
  $resultado = $conn->query($query_select);

  // Verificando se existe esse funcionário
  // Se existe mostra em json a linha do funcionário do banco de dados
  // Se não mostra um erro
  if ($resultado->num_rows == 1) {
    $rows = array();
    while ($r = $resultado->fetch_assoc()) {
      $rows['funcionarios'][] = $r;
    }
    print json_encode($rows);
  } else{
    echo "funcionário não existe";
  }
} else {
  echo "Parâmetros incorretos";
}
