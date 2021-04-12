<!DOCTYPE html>
  <html>
    <head>
      <meta charset="uft-8">
      <title> Sistema de cadastro</title>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">


      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body> 
    

    <nav>
  <a href="#!" class="brand-logo">MusicStation</a><br>
        <div class="nav-wrapper grey darken-1">
            
            <ul class="right hide-on-med-and-down">
                
                <li><a href="index.php">Início</a></li>
                <?php if(isset($_SESSION['login']) and isset($_SESSION['senha'])):?>
                <li><a href="anuncio.php">Meu Anúncio</a></li>
                <li><a href="contratarEvento.php">Contratar evento</a></li>
                <li><a href="meusEventos.php">Meus Eventos</a></li>
                <li><a href="meusContratos.php">Meus Contratos</a></li>
                <li><a href="usuario.php">Perfil</a></li>
                <?php endif ?>              
            </ul>         
        </div>
    </nav>  
    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>