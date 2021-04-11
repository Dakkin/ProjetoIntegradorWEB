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
        <h3 class="light">Meu Anúncio</h3>
        <table class="striped">
        <table>
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Artista</th>
                    <th>Estilo</th>
                    <th>Spotify</th>
                    <th>Instrumentos</th>
                    <th>Cache mínimo</th>
                    <th>Foto</th>
                </tr>
            </thead>

            <tbody>
            <?php
                $sql = "SELECT anuncio.*, usuario.nome FROM anuncio inner join usuario on anuncio.usuario_login = usuario.login WHERE anuncio.usuario_login = '$login'  order by nome";
                $result = pg_query($connect, $sql);
                
                while ($dados = pg_fetch_array($result)):
                ?>    
                    <tr>
                        <td><?php echo $dados['descricao']; ?></td>
                        <td><?php echo $dados['nome']; ?></td>
                        <td><?php echo $dados['estilo']; ?></td>
                        <td><?php echo $dados['spotify']; ?></td>
                        <td><?php echo $dados['instrumentos']; ?></td>
                        <td><?php echo $dados['cache_minimo']; ?></td>
                        <td><img src="<?php echo $dados['foto']; ?>" height="100" width="100"></td>
                        <td><a href="editarAnuncio.php?id=<?php echo $dados['idanuncio'] ?>" class="btn-floating blue"><i class="material-icons">edit</i></a></td>
                        <td><a href="#modal<?php echo $dados['idanuncio']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>
                        
                        <!-- Modal Structure -->
                        <div id="modal<?php echo $dados['idanuncio']; ?>" class="modal">
                            <div class="modal-content">
                                <h4>Atenção!</h4>
                                <p>Tem certeza que deseja apagar este registro?</p>
                            </div>
                            <div class="modal-footer">
                                <form action="php_action/deleteAnuncio.php" method= "POST">
                                    <input type="hidden" name="idanuncio" value="<?php echo $dados['idanuncio'];?>">
                                    <button type="submit" name="btn-deletar" class="btn red">Sim</button>
                                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                                </form>
                            </div>
                        </div>                     
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <br>
        <?php
        if(pg_num_rows($result)<1){?>
            <a href="adicionarAnuncio.php" class="btn">Adicionar Novo</a>
        <?php } ?>
    </div>
  </div>
                    
<?php
    //Footer
    include_once 'includes/footer.php';
?>