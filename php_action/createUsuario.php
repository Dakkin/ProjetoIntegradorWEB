<?php
//Conexão
require_once 'db_connect.php';

if(isset($_POST['btn-cadastrar'])):
    $nome = pg_escape_string($connect, $_POST['nome']);
    $data_nascimento = pg_escape_string($connect, date('Y-m-d', strtotime($_POST["data_nascimento"])));    
    $email = pg_escape_string($connect, $_POST['email']);
    $telefone = pg_escape_string($connect, $_POST['telefone']);
    $login = pg_escape_string($connect, $_POST['login']);
    $senha = pg_escape_string($connect, $_POST['senha']);
    $sql = "INSERT INTO usuario (nome, data_nascimento, email, telefone, login, senha) VALUES ('$nome','$data_nascimento','$email', '$telefone', '$login', '$senha')";
    if (pg_query($connect, $sql)):
        header('Location: ../index.php?sucesso');
    else:
        header('Location: ../index.php?erro');
    endif;
endif;  
pg_close($connect);
?>