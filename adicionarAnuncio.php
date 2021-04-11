<?php
//Header
include_once 'includes/header.php';
// Verifica se existe a sessão com usuario logado

session_start();
//require_once 'db_connect.php';
//function permissao($login_p){
  //  $sql = "SELECT * FROM anuncio WHERE usuario_login = $login_p";
   // if($sql != null){
     //   return 1
  //  }
   // else{
    //    return 0
   // } 
//}
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
        <h3 class="light"> Novo Anúncio</h3>
        <form action="php_action/createAnuncio.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="login" value="<?php echo $login?>">
            <div class="input-field col s12">
                <input type="text" name="descricao" id="descricao">
                <label for="descricao">Descrição</label>
            </div>
            <div class="input-field col s12">
                <select name="estilo">
                    <option value="" disabled selected>Selecione seu estilo</option>
                    <option value="1">Rock</option>
                    <option value="2">Sertanejo</option>
                    <option value="3">Pagode</option>
                    <option value="4">Eletrônica</option>
                    <option value="5">Funk</option>
                    <option value="6">MPB</option>
                </select>
                <label>Materialize Select</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="spotify" id="spotify">
                <label for="spotify">Spotify</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="instrumentos" id="instrumentos">
                <label for="instrumentos">Instrumentos</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="cache_minimo" id="cache_minimo">
                <label for="cache_minimo">Cache mínimo</label>
            </div>
            <input type="file" name="foto">
            <button type="submit" name="btn-cadastrar" class="btn"> Cadastrar </button>
            <a href="anuncio.php" class="btn green"> Voltar para Lista </a>
        </form>
    </div>
  </div>
                    
<?php
    //Footer
    include_once 'includes/footer.php';
?>