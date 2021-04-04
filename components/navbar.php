<!-- Criando uma navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Criando um contêiner -->
  <div class="container-fluid">
    <!-- Colocando uma imagem e um nome do projeto -->
    <a class="navbar-brand" href="#">
      <img src="../../images/logo_AME.png" alt="Logo" title="AME" width="60" height="24" class="d-inline-block align-text-top me-1">
      Exercicio
    </a>
    <!-- Colocando um botão para mostrar ou não o conteudo da navbar -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <!-- Colocando um icone no botão -->
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Criando uma divisão para mostrar na navbar -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Criando uma lista para mostrar na navbar -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!-- Criando um item e link logoff para a navbar -->
        <li class="nav-item me-lg-2">
          <a class="nav-link" aria-current="page" href="../../backend/logoff.php">Logoff</a>
        </li>
        <?php
        // Verificando se o usuario é admin
        // Se é mostra um item e botão cadastrar na navbar
        // Se não é faz nada
        if ($_SESSION['admin']) {
          echo "<li class='nav-item me-lg-2'>
            <button type='button' class='btn btn-secondary' data-bs-toggle='modal' data-bs-target='#addModal'>Cadastrar Funcionário</button>
          </li>";
        }
        ?>
      </ul>
    </div>
  </div>
</nav>