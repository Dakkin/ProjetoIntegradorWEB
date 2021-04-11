<?php
    //Conexão
    include_once 'php_action/db_connect.php';
    //Header
    include_once 'includes/header.php';

session_start();
if (!isset($_SESSION['login']) and !isset($_SESSION['senha']) )
{
    unset($_SESSION['nome']);
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:index.php');
}
else
    $login = $_SESSION['login'];
?>
  <div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light"> Perfil</h3>
        <table class="striped">
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Data de Nascimento</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Login</th>

                </tr>
            </thead>

            <tbody>
            <?php
                $sql = "SELECT * FROM usuario WHERE login = '$login'";
                $result = pg_query($connect, $sql);
                while ($dados = pg_fetch_array($result)):
                ?>    
                    <tr>
                        <td><?php echo $dados['nome']; ?></td>
                        <td><?php echo $dados['data_nascimento']; ?></td>
                        <td><?php echo $dados['email']; ?></td>
                        <td><?php echo $dados['telefone']; ?></td>
                        <td><?php echo $dados['login']; ?></td>
                        <td><a href="editarUsuario.php?login=<?php echo $dados['login'] ?>" class="btn-floating blue"><i class="material-icons">edit</i></a></td>                        
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <br>
        <!--<a href="adicionarUsuario.php" class="btn">Adicionar Novo</a> -->
    </div>
  </div>
                    
<?php
    //Footer
    include_once 'includes/footer.php';
?>