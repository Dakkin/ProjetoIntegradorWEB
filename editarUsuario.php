<?php
    //Conexão
    include_once 'php_action/db_connect.php';
    //Header
    include_once 'includes/header.php';

    //Seleciona o registro para alteração
    if (isset($_GET['login'])):
        $login = pg_escape_string($connect,$_GET['login']);
        $sql = "SELECT * FROM  usuario WHERE Login = '$login'";
        $result = pg_query($connect,$sql);
        $dados = pg_fetch_array($result);
    endif;
?>
  <div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light"> Editar Usuário</h3>
        <form action="php_action/updateUsuario.php" method="POST">
            <div class="input-field col s12">
                <input type="text" name="nome" id="nome" value="<?php echo $dados['nome']?>">
                <label for="nome">Nome</label>
            </div>
            <div class="input-field col s12">
                <input type="date" name="data_nascimento" id="data_nascimento" value="<?php echo $dados['data_nascimento']?>">
                <label for="data_nascimento">Data de Nascimento</label>
            </div>
            <div class="input-field col s12">
                <input type="email" name="email" id="email" value="<?php echo $dados['email']?>">
                <label for="email">E-mail</label>
            </div>
            <div class="input-field col s12">
                <input type="tel" name="telefone" id="telefone" pattern="[0-9]{2}-[0-9]{5}-[0-9]{4}" placeholder="XX-XXXXX-XXXX"value="<?php echo $dados['telefone']?>">
                <label for="telefone">Telefone</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="login" id="login" value="<?php echo $dados['login']?>">
                <label for="login">Login</label>
            </div>
            <div class="input-field col s12">
                <input type="password" name="senha" id="senha" value="<?php echo $dados['senha']?>">
                <label for="senha">Senha</label>
            </div>
            <button type="submit" name="btn-atualizar" class="btn"> Atualizar </button>
            <a href="usuario.php" class="btn green"> Voltar para Lista </a>
        </form>
    </div>
  </div>
                    
<?php
    //Footer
    include_once 'includes/footer.php';
?>