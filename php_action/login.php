<?php
// session_start inicia a sessão
session_start();
// as variáveis login e senha recebem os dados digitados na página anterior
$login = $_POST['login'];
$senha = $_POST['senha'];
//Conexão
include_once 'db_connect.php';
// A variavel $result pega as varias $login e $senha, faz uma
//pesquisa na tabela de usuarios
$sql = "SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha'";
$result = pg_query($connect,$sql);
        
if($dados = pg_fetch_array($result) )
{
    $_SESSION['nome'] = $dados['nome'];
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
}
else{
    unset ($_SESSION['nome']);  
    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
}
header('location:../index.php?'.$_SESSION['nome']);

?>