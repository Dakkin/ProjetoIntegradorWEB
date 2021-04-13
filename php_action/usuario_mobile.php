<?php
require_once 'db_connect.php';
$response = array();
if (isset($_GET['login'])){
    error_log($_GET['login']);
    $login = trim($_GET['login']);
    $sql = "SELECT * FROM usuario WHERE login = '$login'";
}
$result = pg_query($connect, $sql);
if(pg_num_rows($result) > 0){
    $response["usuario"] = array();    
    $usuario = array();
    $anuncio["data_nascimento"] = $row['data_nascimento'];
    $anuncio['nome'] = $row['nome'];
    $anuncio['email'] = $row['email'];
    $anuncio['telefone'] = $row['telefone'];   

    array_push($response["usuario"], $usuario);
    
    
    $response["sucesso"] = "1";

    pg_close($connect);

    echo json_encode($response);

}else {
    $response['sucesso'] = 0;

    pg_close($connect);

    echo json_encode($response);
}
?>