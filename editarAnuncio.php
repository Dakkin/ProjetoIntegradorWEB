<?php
    //Conexão
    include_once 'php_action/db_connect.php';
    //Header
    include_once 'includes/header.php';

    //Seleciona o registro para alteração
    if (isset($_GET['id'])):
        $id = pg_escape_string($connect,$_GET['id']);
        $sql = "SELECT * FROM anuncio WHERE idanuncio = '$id'";
        $result = pg_query($connect,$sql);
        $dados = pg_fetch_array($result);
    endif;
?>
  <div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light"> Editar Anúncio</h3>
        <form action="php_action/updateAnuncio.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name = "id" value="<?php echo $dados['idanuncio']?>">
            <div class="input-field col s12">
                <input type="text" name="descricao" id="descricao" value="<?php echo $dados['descricao']?>">
                <label for="descricao">Descrição</label>
            </div>
            <div class="input-field col s12">
                <select name="estilo">
                    <option value="" disabled selected>Selecione seu estilo</option>
                    <option value="1">Rock</option>
                    <option value="2">Sertanejo</option>
                    <option value="3">Pagode</option>
                 </select>
                 <label>Materialize Select</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="spotify" id="spotify" value="<?php echo $dados['spotify']?>">
                <label for="spotify">Spotify</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="instrumentos" id="instrumentos" value="<?php echo $dados['instrumentos']?>">
                <label for="instrumentos">Instrumentos</label>
            </div>
            <div class="input-field col s12">
                <input type="number" name="cache_minimo" id="cache_minimo" value="<?php echo $dados['cache_minimo']?>">
                <label for="cache_minimo">Cache mínimo</label>
            </div>
            <input type="file" name="foto">
            <button type="submit" name="btn-atualizar" class="btn"> Atualizar </button>
            <a href="anuncio.php" class="btn green"> Voltar </a>
        </form>
    </div>
  </div>
                    
<?php
    //Footer
    include_once 'includes/footer.php';
?>