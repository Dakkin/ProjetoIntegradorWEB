<?php

//Conexão
require_once 'db_connect.php';

if(isset($_POST['btn-deletar'])):
   $idanuncio = pg_escape_string($connect, $_POST['idanuncio']);

   $sql = "DELETE FROM anuncio WHERE idanuncio = '$idanuncio'";
   if (pg_query($connect, $sql)):
        header('Location: ../anuncio.php?sucesso');
   else:
       header('Location: ../anuncio.php?erro');
  endif;
endif; 
?>