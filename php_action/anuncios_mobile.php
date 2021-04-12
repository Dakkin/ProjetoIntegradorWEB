<?php

$login = trim($_POST['login']);
require_once 'db_connect.php';
$response = array();

$result = pg_query($connect, "SELECT anuncio.*, usuario.nome FROM anuncio inner join usuario on anuncio.usuario_login = usuario.login WHERE anuncio.usuario_login != '$login' order by nome");

if(pg_num_rows($result) > 0){
    $response["anuncios"] = array();

    while ($row = pg_fetch_array($result)){
        $anuncio = array();
        $anuncio["Idanuncio"] = $row['idanuncio'];
        $anuncio['nome'] = $row['nome'];
        $anuncio['estilo'] = $row['estilo'];
        $anuncio['cache'] = $row['cache_minimo'];
        $anuncio['foto'] = $row['foto'];

        array_push($response["anuncios"], $anuncio);
    }

    $response["success"] = "1";

    pg_close($connect);

    echo json_encode($response);

}else {
    $response['success'] = 0;

    pg_close($connect);

    echo json_encode($response);
}
?>