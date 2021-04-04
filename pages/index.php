<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
  <link rel="shortcut icon" href="../images/favicon.png" type="image/png" />
  <title>Login</title>
  <link rel="stylesheet" href="../styles/global.css">
</head>

<body>
  <!-- Criando um contêiner para a pagina do login -->
  <div id="login" class="container">
    <!-- Criando uma linha com borda arredondada -->
    <main class="row p-2 m-2 border border-2 rounded">
      <!-- Criando uma divisão para o titulo e deixando no centro da tela -->
      <div class="text-center">
        <h1>Login</h1>
        <hr />
      </div>
      <!-- Criando uma divisão para o formulario -->
      <div>
        <form method="post" action="../backend/authenticate.php" onsubmit="validaFormulario()">
          <!-- Criando uma linha para a label e o input nome -->
          <div class="row mb-3">
            <!-- Caso a tela for pequena deixa a label e o input separados -->
            <!-- Caso a tela não for pequena deixa a label e o input juntos em uma linha -->
            <label for="name" class="col-sm-2 col-form-label">Nome</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="name" id="name" oninput="nomeComLetrasMaiuscula()" required />
            </div>
          </div>
          <!-- Criando uma linha para a label e o input senha -->
          <div class="row mb-3">
            <!-- Caso a tela for pequena deixa a label e o input separados -->
            <!-- Caso a tela não for pequena deixa a label e o input juntos em uma linha -->
            <label for="password" class="col-sm-2 col-form-label">Senha</label>
            <div class="col-sm-10">
              <!-- Coloca o input e o botao juntos em uma linha -->
              <div class="input-group">
                <input type="password" class="form-control" name="password" id="password" oninput="senhaComLetrasMaiuscula()" required />
                <button class="btn btn-outline-secondary" type="button" onclick="mostrarSenha()">Mostrar senha</button>
              </div>
            </div>
          </div>
          <!-- Criando uma linha para o botao de logar -->
          <div class="row mb-3">
            <button class="btn btn-primary" type="submit">Logar</button>
          </div>
        </form>
      </div>
    </main>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script src="index.js"></script>
</body>

</html>