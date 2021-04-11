<?php
//Conexão
require_once 'db_connect.php';

if(isset($_POST['btn-contrata'])):
    $idanuncio = pg_escape_string($connect, $_POST['idanuncio']);
    $login = pg_escape_string($connect, $_POST['login']);
    $data_contratacao = pg_escape_string($connect,$_POST["data_contratacao"]); 
    //$hora = pg_escape_string($connect, $_POST['hora']);
    $local_evento = pg_escape_string($connect, $_POST['local_evento']);
    $cache_combinado = pg_escape_string($connect, $_POST['cache_combinado']);
    
    $sql = "INSERT INTO contrata (usuario_Login, anuncio_idanuncio, data_contratacao, cache_combinado, local_evento) VALUES ('$login','$idanuncio','$data_contratacao', '$cache_combinado','$local_evento')";
    //echo $sql;
    if (pg_query($connect, $sql)):
        header('Location: ../contratarEvento.php?sucesso');
    else:
        header('Location: ../contratarEvento.php?erro');
    endif;
endif; 
?>