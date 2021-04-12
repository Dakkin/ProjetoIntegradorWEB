<?php
require_once 'db_connect.php';

$response = array();
if (isset($_POST['login']) && isset($_POST['senha']) && isset($_POST['email']) && isset($_POST['telefone']) && isset($_POST['nome']) && isset($_POST['data_nascimento'])){
    $login = trim($_POST['login']);
    $senha = trim($_POST['senha']);
    $telefone = trim($_POST['telefone']);
    $email = trim($_POST['email']);
    $nome = trim($_POST['nome']);
    $data_nascimento = pg_escape_string($connect, date('Y-m-d', strtotime($_POST["data_nascimento"])));    

    

    $result = pg_query($connect, "INSERT INTO usuario (nome, data_nascimento, email, telefone, login, senha) VALUES ('$nome','$data_nascimento','$email', '$telefone', '$login','$senha')");
		if ($result) {
			$response["success"] = 1;
		}
		else {
			$response["success"] = 0;
			$response["error"] = "Error BD: ".pg_last_error($connect);

        }
}

pg_close($connect);
echo json_encode($response);



?>