<?php
//Conexão
require_once 'db_connect.php';
$response = array();
if (isset($_POST['descricao']) && isset($_POST['estilo']) && isset($_POST['spotify']) && isset($_POST['instrumentos']) && isset($_POST['cache_minimo']) && isset($_FILES['foto']) && isset($_POST['login'])):
    $descricao = pg_escape_string($connect, $_POST['descricao']);
    $estilo = (int)pg_escape_string($connect, $_POST['estilo']);
    $spotify = pg_escape_string($connect, $_POST['spotify']);
    $instrumentos = pg_escape_string($connect, $_POST['instrumentos']);
    $cache_minimo = floatval(pg_escape_string($connect, $_POST['cache_minimo']));
    $login = pg_escape_string($connect, $_POST['login']);
   


    $imageFileType = strtolower(pathinfo(basename($_FILES["foto"]["name"]),PATHINFO_EXTENSION));
    $image_base64 = base64_encode(file_get_contents($_FILES['foto']['tmp_name']));
    $img = 'data:image/'.$imageFileType.';base64,'.$image_base64;
    
    $sql = "INSERT INTO anuncio (estilo, spotify, instrumentos, cache_minimo, descricao, foto, usuario_login) VALUES ('$estilo','$spotify','$instrumentos', '$cache_minimo','$descricao','$img','$login')";
    if (pg_query($connect, $sql)):
        $response['sucesso'] = 1;
    else:
        $response['sucesso'] = 0;
        $response['erro'] = "Não foi possível adicionar o anúncio";
    endif;
else:
    $response['sucesso'] = 0;
    $response['erro'] = "Faltam parâmetros no anúncio";
endif; 

pg_close($connect);

echo json_encode($response);
?>