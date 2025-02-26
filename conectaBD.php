<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pizzaria";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
  die("Conexão falhou: " . $conn->connect_error);
}

// Recebe os dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];
$senha = $_POST['senha'];

// Criptografa a senha usando a função password_hash do PHP
$senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);

// Correção na query SQL: adicionado a aspa simples antes de $nome
$sql = "INSERT INTO clientes (id_cliente, nome, email, endereco, senha)
VALUES ('', '$nome', '$email', '$endereco', '$senha_criptografada')";

if ($conn->query($sql) === TRUE) {
  echo "Novo registro criado com sucesso";
} else {
  echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
