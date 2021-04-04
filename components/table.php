<!-- Criando uma tabela listrada -->
<table class="table table-striped table-hover">
  <!-- Criando o cabeçalho da tabela e deixando o texto no centro -->
  <thead>
    <tr class='text-center'>
      <th>Matricula</th>
      <th>Nome do Funcionário</th>
      <th>Descrição do Setor</th>
      <th>Data de Admissão</th>
      <?php
      // Verificando se o usuario é admin
      // Se é mostra um item na tabela
      // Se não é faz nada
      if ($_SESSION['admin']) {
        echo "<th>#</th>";
      }
      ?>
    </tr>
  </thead>
  <!-- Criando o corpo da tabela-->
  <tbody>
    <?php
    // Pegando o arquivo para mostrar os funcionarios na tabela
    require_once(dirname(__FILE__) . "/../backend/tableFuncionarios.php")
    ?>
  </tbody>
</table>