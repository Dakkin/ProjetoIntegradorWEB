<?php
// Verifica se existe a sessão com usuario logado
session_start();
    //Header
    //include_once 'includes/header.php';
    if(isset($_SESSION['nome'])){
      include_once("includes/header-signedin.php");
  }else{  
      include_once("includes/header.php");
  }


if (!isset ($_SESSION['login']) and !isset ($_SESSION['senha']) )
{
    unset($_SESSION['nome']);
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    //header('location:index.php');
    
?>
<div id="login-page" class="row" style="width:400px;">
    <div class="col s12 z-depth-6 card-panel">
      <form class="login-form" action="php_action/login.php" method="POST">
        <div class="row">
        </div>
        <br>
        <div class="row">
          <div class="input-field col s12">
            <i class="material-icons prefix">mail_outline</i>
            <input name="login" id="login" type="text">
            <label for="login" data-error="wrong" data-success="right">Login</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <i class="material-icons prefix">lock_outline</i>
            <input name="senha" id="senha" type="password">
            <label for="senha">Senha</label>
          </div>
        </div>
        <div class="row">          
          <div class="input-field col s12 m12 l12  login-text">
              <input type="checkbox" id="lembrar" />
              <label for="lembrar">Lembrar-me</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
          <button type="submit" name="btn-atualizar" class="btn"> Login </button>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6 m6 l6">
            <p class="margin medium-small"><a href="adicionarUsuario.php">Registrar Agora!</a></p>
          </div>  
        </div>
      </form>
    </div>
  </div>
<?php  
}
else{
    $logado = $_SESSION['nome'];
?>
  <div id="login-page" class="row" style="width:400px;">
    <div class="col s12 z-depth-6 card-panel">
      <form class="login-form" action="php_action/login.php" method="POST">
        <div class="row">
        </div>
        <br>
        <h3><?php echo "Bem vindo ".$logado."!";?></h3>
        <div class="row">
          <div class="input-field col s12">
          <button type="submit" name="btn-atualizar" class="btn"> Sair </button>
          </div>
        </div>
      </form>
    </div>
  </div>
<?php  
}
?>
  
  
                    
<?php
    //Footer
    include_once 'includes/footer.php';
?>