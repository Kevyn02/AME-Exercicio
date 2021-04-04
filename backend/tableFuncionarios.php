<?php
// Pegando o arquivo para conectar no banco de dados
require_once(dirname(__FILE__) . "/../database/conn.php");

// Criando um query para pegar todos os funcionarios na tabela de funcionarios
// retornando matricula, nome, o nome do setor, data de admissão e id
$query_select = "SELECT f.NR_MATRICULA, f.NOME, s.NM_SETOR, f.DT_ADMISSAO, f.CD_FUNCIONARIO
FROM funcionarios AS f, setor AS s 
WHERE f.CD_FK_SETOR = s.CD_SETOR";

// Enviando a query para banco de dados e retornando o resultado em uma variável 
$resultado = $conn->query($query_select);

// Verificando se existe funcionarios na tabela de funcionarios
// Se existe continua
// Se não existe mostra um erro 
if ($resultado->num_rows > 0) {
  // Para cada linha de resultado mostra uma linha na tabela 
  // com os valores de matricula, nome, o nome do setor, data de admissão
  while ($row = $resultado->fetch_assoc()) {
    // Cria uma nova classe de DateTime para formatar a data de admissão no futuro
    $data = new DateTime($row['DT_ADMISSAO']);
    // Cria uma linha no corpo da tabela e deixa o texto no centro
    echo "<tr class='text-center'>";
    echo "<td>" . $row["NR_MATRICULA"] . "</td>";
    echo "<td>" . $row["NOME"] . "</td>";
    echo "<td>" . $row["NM_SETOR"] . "</td>";
    // Aqui transforma a data do banco("Y/m/d") em "d/m/Y"
    echo "<td>" . $data->format("d/m/Y") . "</td>";
    // Verifica se o usuario é admin
    // Se for admin mostra um botão para editar funcionario especifico
    // Se não mostra nada
    if ($_SESSION['admin']) {
      echo "<td>";
      echo "<button type='button' 
      class='btn btn-secondary' 
      data-bs-toggle='modal' 
      data-bs-target='#editModal'
      onclick='getFuncionario(" . $row["CD_FUNCIONARIO"] . ")'
      >Alterar Campo</button>";
      echo "</td>";
    }
    echo "</tr>";
  }
} else {
  // Cria um variável
  // se o usuario é admin o valor dela é 5
  // se não é 4
  $colspan = $_SESSION['admin'] ? 5 : 4;

  // Mostra o erro
  // Cria uma linha no corpo da tabela e deixa o texto no centro
  echo "
  <tr class='text-center'>
  <td colspan='$colspan'>Sem resultados</td>
  </tr>
  ";
}
