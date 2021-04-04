<?php
// Pegando o arquivo para conectar no banco de dados
require_once(dirname(__FILE__) . "/../database/conn.php");

// Criando um query para pegar todos os setores na tabela de setor ordernado pelo id
$query_setor = "SELECT * FROM setor ORDER BY CD_SETOR";

// Enviando a query para banco de dados e retornando o resultado em uma variável 
$resultado = $conn->query($query_setor);

// Verificando se existe o usuario
// Se existe continua
// Se não existe faz nada
if ($resultado->num_rows > 0) {
  // Cria uma variável para armarzenar o id do setor e o nome
  $options = array();
  // Enquanto tiver linhas de resultado faça
  while ($row = $resultado->fetch_assoc()) {
    // Adiciona o valor da linha do banco de dados na variável
    array_push($options, $row);
  }
}

// Criando um query para pegar a ultima matricula tabela de funcionarios
// ordernado pela matricula em ordem decrescente
$query_matricula = "SELECT NR_MATRICULA FROM funcionarios 
ORDER BY NR_MATRICULA DESC LIMIT 1";

// Enviando a query para banco de dados e retornando o resultado em uma variável 
$resultado = $conn->query($query_matricula);

// Verificando se existe um resultado
// Se existe continua
// Se não faz nada
if ($resultado->num_rows === 1) {
  while ($row = $resultado->fetch_assoc()) {
    // Cria uma variável com valor do ultimo numero da matricula + 1
    $matricula = $row['NR_MATRICULA'] + 1;
  }
}
?>

<!-- Criando uma divisão para o modal -->
<div class="modal" id="addModal" tabindex="-1">
  <div class="modal-dialog">
    <!-- Criando uma divisão para o conteudo do modal -->
    <div class="modal-content">
      <!-- Criando uma divisão para o cabeçalho do modal -->
      <!-- Colocando titulo e um botão para fechar o modal -->
      <div class="modal-header">
        <h5 class="modal-title">Cadastrar Funcionário</h5>
        <button type="button" class="btn-close" onclick="limpaFormulario()" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- Criando uma divisão para o corpo do modal -->
      <div class="modal-body">
        <!-- Criando um contêiner para o formulario -->
        <form class="container" method="post" action="../../backend/createFuncionario.php" onsubmit="validaFormulario('add')">
          <!-- Criando uma linha para a label e o input matricula -->
          <div class="row mb-3">
            <label for="addMatricula" class="form-label">Matricula</label>
            <input value="<?php /* Mostra a ultima matricula + 1 */ echo $matricula ?>" type="text" class="form-control" name="addMatricula" id="addMatricula" disabled required />
          </div>
          <!-- Criando uma linha para a label e o input nome -->
          <div class="row mb-3">
            <label for="addNome" class="form-label">Nome Completo</label>
            <input type="text" class="form-control" name="addNome" id="addNome" oninput="nomeComLetrasMaiuscula()" required />
          </div>
          <!-- Criando uma linha para a label e o select setor -->
          <div class="row mb-3">
            <label for="addSetor" class="form-label">Setor</label>
            <select name="addSetor" id="addSetor" class="form-select" required>
              <?php
              // Cria um <option> para cada setor na variável options
              for ($i = 0; $i < count($options); $i++) {
                echo "<option value='" . $options[$i]['CD_SETOR'] . "'>" . $options[$i]['NM_SETOR'] . "</option>";
              }
              ?>
            </select>
          </div>
          <!-- Criando uma linha para a label e o input data de admissão -->
          <div class="row mb-3">
            <label for="addDt_admissao" class="form-label">Data de admissão</label>
            <input type="date" class="form-control" name="addDt_admissao" id="addDt_admissao" required />
          </div>
          <!-- Criando uma linha para o botâo de cadastrar e cancelar -->
          <div class="row">
            <button type="button" class="col-6 btn btn-secondary" onclick="limpaFormulario()" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="col-6 btn btn-primary">Cadastrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>