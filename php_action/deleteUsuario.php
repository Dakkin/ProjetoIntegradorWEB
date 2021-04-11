<?php
//Conexão
require_once 'db_connect.php';

if(isset($_POST['btn-deletar'])):
    $login = pg_escape_string($connect, $_POST['login']);

    $sql = "DELETE FROM clientes WHERE Login = '$login'";
    if (pg_query($connect, $sql)):
        header('Location: ../usuario.php?sucesso');
    else:
        header('Location: ../usuario.php?erro');
    endif;
endif; 
?>