<?php
// as variáveis login e senha recebem os dados digitados na página anterior

$response = array();

$login = $_POST['login'];
$senha = $_POST['senha'];
//Conexão
include_once 'db_connect.php';
// A variavel $result pega as varias $login e $senha, faz uma
//pesquisa na tabela de usuarios
$sql = "SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha'";
$result = pg_query($connect,$sql);
        
if($dados = pg_fetch_array($result))
{
   $response["sucesso"] = 1;
}
else{
    $response["sucesso"] = 0;
}
pg_close($connect);
echo json_encode($response);
?>