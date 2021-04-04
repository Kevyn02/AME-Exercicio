function nomeComLetrasMaiuscula() {
  // Pega o input name
  const nome = document.getElementById("name");
  // Transforma o valor de name em maiusculo e retorna para o input
  nome.value = nome.value.toLocaleUpperCase();
}

function senhaComLetrasMaiuscula() {
  // Pega o input password
  const senha = document.getElementById("password");
  // Transforma o valor de password em maiusculo e retorna para o input
  senha.value = senha.value.toLocaleUpperCase();
}

function mostrarSenha() {
  // Pega o input password
  const senha = document.getElementById("password");
  // Verifica se o tipo do input password
  // Se é tipo password troca para texto e vice versa
  if (senha.type === "password") {
    senha.type = "text";
  } else {
    senha.type = "password";
  }
}

function validaFormulario() {
  // Cria uma variável boleana para a validação
  let validacao = true;

  // Pega o valor input name e password
  const nome = document.getElementById("name").value;
  const senha = document.getElementById("password").value;

  // Verifica se o nome é vazio ou se a senha é vazia
  // Se for o valor da validação será falso
  // Se não for faz nada
  if (nome === "" || senha === "") {
    validacao = false;
  }

  // Retorna o valor da validação
  return validacao;
}
