<?php
    //Header
    include_once 'includes/header.php';
?>
  <div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light"> Novo Usuário</h3>
        <form action="php_action/createUsuario.php" method="POST">
            <div class="input-field col s12">
                <input type="text" name="nome" id="nome">
                <label for="nome">Nome</label>
            </div>
            <div class="input-field col s12">
                <input type="date" id="data_nascimento" placeholder="DD/MM/AAAA" name="data_nascimento">
                <label for="data_nascimento">Data de Nascimento</label>
            </div>
            <div class="input-field col s12">
                <input type="email" name="email" id="email">
                <label for="email">E-mail</label>
            </div>
            <div class="input-field col s12">
                <input type="tel" name="telefone" id="telefone" placeholder="(XX) X XXXX-XXXX">
                <label for="telefone">Telefone</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="login" id="login">
                <label for="login">Login</label>
            </div>
            <div class="input-field col s12">
                <input type="password" name="senha" id="senha">
                <label for="senha">Senha</label>
            </div>
            <button type="submit" name="btn-cadastrar" class="btn"> Cadastrar </button>
            <a href="index.php" class="btn green"> Voltar para Início </a>
        </form>
    </div>
  </div>
                    
<?php
    //Footer
    include_once 'includes/footer.php';
?>