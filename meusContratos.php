<?php
//Conexão
include_once 'php_action/db_connect.php';
//Header
include_once 'includes/header.php';
// Verifica se existe a sessão com usuario logado
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
        <h3 class="light"> Meus Contratos</h3>
        <table class="striped">
        <table>
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Artista</th>           
                    <th>Data</th>
                    <th>Cache combindado</th>
                    <th>Local</th>
                </tr>
            </thead>

            <tbody>
            <?php
                $sql = "SELECT anuncio.descricao, usuario.nome, contrata.* FROM contrata inner join anuncio on contrata.anuncio_idanuncio = anuncio.idanuncio inner join usuario on anuncio.usuario_login = usuario.login WHERE contrata.usuario_login = '$login'  order by contrata.data_contratacao";
                $result = pg_query($connect, $sql);
                while ($dados = pg_fetch_array($result)):
                ?>    
                    <tr>
                        <td><?php echo $dados['descricao']; ?></td>
                        <td><?php echo $dados['nome']; ?></td>
                        <td><?php echo $dados['data_contratacao']; ?></td>
                        <td><?php echo $dados['cache_combinado']; ?></td>                        
                        <td><?php echo $dados['local_evento']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <br>
    </div>
  </div>
                    
<?php
    //Footer
    include_once 'includes/footer.php';
?>