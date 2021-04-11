<?php
//Conexão
require_once 'db_connect.php';

if(isset($_POST['btn-atualizar'])):
    $nome = pg_escape_string($connect, $_POST['nome']);
    $data_nascimento = pg_escape_string($connect, date('Y-m-d', strtotime($_POST["data_nascimento"])));    
    $email = pg_escape_string($connect, $_POST['email']);
    $telefone = pg_escape_string($connect, $_POST['telefone']);
    $login = pg_escape_string($connect, $_POST['login']);
    $senha = pg_escape_string($connect, $_POST['senha']);

    $sql = "UPDATE usuario SET Nome = '$nome',data_nascimento = '$data_nascimento', email = '$email', telefone = '$telefone', login = '$login', senha = '$senha' WHERE login = '$login'";
    if (pg_query($connect, $sql)):
        header('Location: ../usuario.php?sucesso');
    else:
        header('Location: ../usuario.php?erro');
    endif;
endif; 
?>