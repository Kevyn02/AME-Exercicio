<?php
// Pegando o arquivo para conectar no banco de dados
require_once(dirname(__FILE__) . "/../database/conn.php");

// Criando um query para pegar todos os setores na tabela de setor ordernado pelo id
$query = "SELECT * FROM setor ORDER BY CD_SETOR";

// Enviando a query para banco de dados e retornando o resultado em uma variável 
$resultado = $conn->query($query);

// Verificando se existe o usuario se existe
// Se existe continua
// Se não faz nada
if ($resultado->num_rows > 0) {
  // Cria uma variável para armarzenar o id do setor e o nome
  $options = array();
  // Enquanto tiver linhas de resultado faça
  while ($row = $resultado->fetch_assoc()) {
    // Adiciona o valor da linha do banco de dados na variável
    array_push($options, $row);
  }
}
?>

<!-- Criando uma divisão para o modal -->
<div class="modal" id="editModal" tabindex="-1">
  <div class="modal-dialog">
    <!-- Criando uma divisão para o conteudo do modal -->
    <div class="modal-content">
      <!-- Criando uma divisão para o cabeçalho do modal -->
      <!-- Colocando titulo e um botão para fechar o modal -->
      <div class="modal-header">
        <h5 class="modal-title">Editar Funcionário</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- Criando uma divisão para o corpo do modal -->
      <div class="modal-body">
        <!-- Criando um contêiner para o formulario -->
        <form class="container" method="post" action="../../backend/updateFuncionario.php" onsubmit="validaFormulario('edit')">
          <!-- Criando uma linha para a label e o input matricula -->
          <div class="row mb-3">
            <label for="editMatricula" class="form-label">Matricula</label>
            <input type="text" class="form-control" name="editMatricula" id="editMatricula" disabled />
          </div>
          <!-- Criando uma linha para a label e o input nome -->
          <div class="row mb-3">
            <label for="editNome" class="form-label">Nome Completo</label>
            <input type="text" class="form-control" id="editNome" disabled />
          </div>
          <!-- Criando uma linha para a label e o select setor -->
          <div class="row mb-3">
            <label for="editSetor" class="form-label">Setor</label>
            <select name="editSetor" id="editSetor" class="form-select">
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
            <label for="editDt_admissao" class="form-label">Data de admissão</label>
            <input type="date" class="form-control" id="editDt_admissao" disabled />
          </div>
          <!-- Criando uma linha para o botão de cadastrar e cancelar -->
          <div class="row">
            <button type="button" class="col-6 btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="col-6 btn btn-primary">Salvar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>