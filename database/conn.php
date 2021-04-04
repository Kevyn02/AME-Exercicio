<?php

// Local do banco de dados
$server = 'localhost';

// Usuario no banco de dados
$user = 'root';

// Senha do usuario no banco de dados
$password = '';

// Qual banco de dados vai utilizar
$database = 'ame_exercicio';

// Criando a conexão do banco de dados passando as variáveis acima
$conn = new mysqli($server, $user, $password, $database);

// Verificando se deu erro na conexão e mostra o erro
if ($conn->connect_error) {
    die('Falha ao conectar' . $conn->connect_error);
}
