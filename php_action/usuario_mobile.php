<?php
require_once 'db_connect.php';
$response = array();
if (isset($_GET['login'])){
    error_log($_GET['login']);
    $login = trim($_GET['login']);
    $sql = "SELECT * FROM usuario WHERE login = '$login'";
    $result = pg_query($connect, $sql);
    if(pg_num_rows($result) > 0){
        $row = pg_fetch_array($result);
        $response["usuario"] = array();    
        $usuario = array();
        $usuario["data_nascimento"] = $row['data_nascimento'];
        $usuario['nome'] = $row['nome'];
        $usuario['email'] = $row['email'];
        $usuario['telefone'] = $row['telefone'];   

        array_push($response["usuario"], $usuario);
    
        $response["sucesso"] = "1";
    }
    else{
        $response['sucesso'] = 0;
        $response['erro'] = "Não foi possivel obter os dados do usuário";
    } 
}
else {
    $response['sucesso'] = 0;
    $response['erro'] = "Não foi passado o login do usuário";
}
pg_close($connect);

echo json_encode($response);

?>
