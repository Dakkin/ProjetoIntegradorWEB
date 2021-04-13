<?php
require_once 'db_connect.php';
$response = array();
if (isset($_GET['idanuncio'])){
    $idanuncio = trim($_GET['idanuncio']);
    $sql = "SELECT * FROM anuncio WHERE idanuncio = '$idanuncio'";
    $result = pg_query($connect, $sql);
    if(pg_num_rows($result) > 0){
        $row = pg_fetch_array($result);
        $response["anuncio"] = array();    
        $anuncio = array();
        $anuncio["estilo"] = $row['estilo'];
        $anuncio['spotify'] = $row['spotify'];
        $anuncio['instrumentos'] = $row['instrumentos'];
        $anuncio['cache_minimo'] = $row['cache_minimo'];
        $anuncio['descricao'] = $row['descricao'];
        $anuncio['foto'] = $row['foto'];
        $sqlusuario = "SELECT email, nome FROM usuario WHERE login = $row['usuario_login']";
        $resultUsuario = pg_query($connect, $sqlusuario);
        $rowUsuario = pg_fetch_array($resultUsuario);
        $anuncio['email'] = $rowUsuario['email'];
        $anuncio['nome'] = $rowUsuario['nome'];


        array_push($response["anuncio"], $anuncio);
    
        $response["sucesso"] = "1";
    }
    else{
        $response['sucesso'] = 0;
        $response['erro'] = "Não foi possivel obter os dados do anúncio";
    } 
}
else {
    $response['sucesso'] = 0;
    $response['erro'] = "Não foi passado o id do anúncio";
}
pg_close($connect);

echo json_encode($response);

?>
