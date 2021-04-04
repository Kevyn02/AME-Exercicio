function getFuncionario(id) {
  // Faz uma requisição em uma pagina com o valor de cd_funcionario = id
  fetch(`../../backend/getFuncionario.php?cd_funcionario=${id}`)
    .then((response) => {
      // Então retorna o json
      return response.json();
    })
    .then(function (data) {
      // Cria a variável e dá o valor do objeto funcionarios
      const funcionarios = data.funcionarios;

      // Pega os inputs matricula, nome, setor, data de admissão
      const matricula = document.getElementById("editMatricula");
      const nome = document.getElementById("editNome");
      const setor = document.getElementById("editSetor");
      const dt_admissao = document.getElementById("editDt_admissao");

      // Atribui o valor respectivo ao objeto funcionarios
      matricula.value = funcionarios[0].NR_MATRICULA;
      nome.value = funcionarios[0].NOME;
      setor.value = funcionarios[0].CD_FK_SETOR;
      dt_admissao.value = funcionarios[0].DT_ADMISSAO;
    });
}

function nomeComLetrasMaiuscula() {
  // Pega o input name
  const nome = document.getElementById("addNome");
  // Transforma o valor de name em maiusculo e retorna para o input
  nome.value = nome.value.toLocaleUpperCase();
}

function limpaFormulario() {
  // Coloca o valor dos inputs ao padrão ao fechar o modal
  document.getElementById("addNome").value = "";
  document.getElementById("addSetor").value = 1;
  document.getElementById("addDt_admissao").value = "";
}

function validaFormulario(type) {
  // Cria uma variável boleana para a validação
  let validacao = true;

  // Pega o valor input nome, matricula, setor e data de admissão
  // O valor de type pode ser "add" ou "edit", pegando os inputs referentes ao modal
  const matricula = document.getElementById(`${type}Matricula`);
  const nome = document.getElementById(`${type}Nome`).value;
  const setor = document.getElementById(`${type}Setor`).value;
  const dt_admissao = document.getElementById(`${type}Dt_admissao`).value;

  // Verifica se o nome ou matricula ou setor ou data de admissão são vazio
  // Se for o valor da validação será falso
  // Se não for faz nada
  if (
    matricula.value === "" ||
    nome === "" ||
    setor === "" ||
    dt_admissao === ""
  ) {
    validacao = false;
  }

  // Verifica se o valor da validação é verdadeiro
  // Se for o input da matricula não fica desabilitado
  // Se não for faz nada
  if (validacao) {
    matricula.disabled = false;
  }

  // Retorna o valor da validação 
  return validacao;
}
