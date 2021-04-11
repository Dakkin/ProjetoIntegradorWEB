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
    $estilo = $_GET['estilo'];
?>
  <div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Filtrar por Estilos</h3>
        <form action="contratarEvento.php" method="GET"> 
        <input type="hidden" value="1" name="estilo">
        <button type="submit" name="btn-rock" class="btn blue">Rock</button>
        </form>

        <form action="contratarEvento.php" method="GET"> 
        <input type="hidden" value="2" name="estilo">
        <button type="submit" name="btn-sertanejo" class="btn blue">Sertanejo</button>
        </form>

        <form action="contratarEvento.php" method="GET"> 
        <input type="hidden" value="3" name="estilo">
        <button type="submit" name="btn-pagode" class="btn blue">Pagode</button>
        </form>

        <form action="contratarEvento.php" method="GET"> 
        <input type="hidden" value="4" name="estilo">
        <button type="submit" name="btn-eletrônica" class="btn blue">Eletrônica</button>
        </form>


        <form action="contratarEvento.php" method="GET"> 
        <input type="hidden" value="5" name="estilo">
        <button type="submit" name="btn-Funk" class="btn blue">Funk</button>
        </form>

        <form action="contratarEvento.php" method="GET"> 
        <input type="hidden" value="6" name="estilo">
        <button type="submit" name="btn-mpb" class="btn blue">MPB</button>
        </form>


        <h3 class="light"> Anúncios </h3>
        <table class="striped">
        <table>
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Artista</th>
                    <th>Estilos</th>
                    <th>Spotify</th>
                    <th>Instrumentos</th>
                    <th>Cache mínimo</th>
                    <th>Foto</th>
                </tr>
            </thead>

            <tbody>

            <?php
            if(isset($_GET['estilo'])){
                $sql = "SELECT anuncio.*, usuario.nome FROM anuncio inner join usuario on anuncio.usuario_login = usuario.login WHERE anuncio.usuario_login != '$login' AND anuncio.estilo = '$estilo'  order by nome";
            } 
            else{              
                $sql = "SELECT anuncio.*, usuario.nome FROM anuncio inner join usuario on anuncio.usuario_login = usuario.login WHERE anuncio.usuario_login != '$login' order by nome";
            }
                $result = pg_query($connect, $sql);
                while ($dados = pg_fetch_array($result)):
                    $estilo="Pagode";
                    if($dados['estilo']=='1'):
                        $estilo='Rock';
                    elseif($dados['estilo']=='2'):
                        $estilo='Sertanejo';
                    elseif($dados['estilo']=='4'):
                        $estilo='Eletrônica';
                    elseif($dados['estilo']=='5'):
                        $estilo='Funk';
                    elseif($dados['estilo']=='6'):
                        $estilo='MPB';     
                    else:
                        $estilo ='Pagode';
                    endif;   
            ?>    
                  

                    <tr>

                        <td><?php echo $dados['descricao']; ?></td>
                        <td><?php echo $dados['nome']; ?></td>
                        <td><?php echo $dados['estilo']; ?></td>
                        <td><?php echo $dados['spotify']; ?></td>
                        <td><?php echo $dados['instrumentos']; ?></td>
                        <td><?php echo $dados['cache_minimo']; ?></td>
                        <td><img src="<?php echo $dados['foto']; ?>" height="100" width="100"></td>
                        <td><a href="#modal<?php echo $dados['idanuncio']; ?>" class="btn modal-trigger blue">contratar</a></td>
                    
                        <!-- Modal Structure -->

                        <div id="modal<?php echo $dados['idanuncio']; ?>" class="modal">
                            <div class="modal-content">
                                <h4>Dados para a realização do evento</h4>
                            </div>
                            <div class="modal-footer">
                                <form action="php_action/contratar.php" method= "POST">
                                    <input type="hidden" name="idanuncio" value="<?php echo $dados['idanuncio'];?>">
                                    <input type="hidden" name="login" value="<?php echo $login;?>">
                                    <div class="input-field col s12">
                                        <input type="datetime-local" id="data_contratacao" name="data_contratacao">  
                                        <label for="data_contratacao">Data do evento</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <input type="number" name="cache_combinado" id="cache_combinado">
                                        <label for="cache_combinado">Cache combinado</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <input type="text" name="local_evento" id="local_evento">
                                        <label for="local_evento">Local</label>
                                    </div>
                                    <button type="submit" name="btn-contrata" class="btn blue">Contratar</button>
                                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                                </form>
                            </div>
                        </div>
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