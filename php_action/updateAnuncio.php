<?php
//Conexão
require_once 'db_connect.php';



if (isset($_POST['descricao']) && isset($_POST['estilo']) && isset($_POST['spotify']) && isset($_POST['instrumentos']) && isset($_POST['cache_minimo'])  && isset($_POST['id'])):    
  $id = pg_escape_string($connect, $_POST['id']);
  $descricao = pg_escape_string($connect, $_POST['descricao']);
  $estilo = (int)pg_escape_string($connect, $_POST['estilo']);
  $spotify = pg_escape_string($connect, $_POST['spotify']);
  $instrumentos = pg_escape_string($connect, $_POST['instrumentos']);
  $cache_minimo = floatval(pg_escape_string($connect, $_POST['cache_minimo']));
    
  $imageFileType = strtolower(pathinfo(basename($_FILES["foto"]["name"]),PATHINFO_EXTENSION));
  $image_base64 = base64_encode(file_get_contents($_FILES['foto']['tmp_name']));
  $img = 'data:image/'.$imageFileType.';base64,'.$image_base64;

  $sql = "UPDATE anuncio SET estilo='$estilo', spotify='$spotify',instrumentos='$instrumentos', cache_minimo='$cache_minimo', descricao='$descricao', foto='$img' WHERE idanuncio ='$id'";
  if (pg_query($connect, $sql)):
    header('Location: ../anuncio.php?sucesso');
  else:
    header('Location: ../anuncio.php?erro1');
    error_log('falha da consulta de atualização');
  endif;
else:
    header('Location: ../anuncio.php?erro2');
    error_log('falha na passagem dos parâmetros');
endif; 
?>