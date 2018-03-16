﻿<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>SAEG - GEOPE SE/BSB</title>
    <link rel="shortcut icon" href="http://correios.com.br/++theme++correios.site.tema/images/favicon.ico" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
  <script src="js/script.js"></script>
  <script>
    $(document).ready(){
      $('#myModal').modal('hide');
    }
  </script>

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">

    <form class="form-signin">
      <img class="mb-4" src="http://correios.com.br/++theme++correios.site.tema/images/logo_correios.png" alt="Correios" title="SAEG - GEOPE SE/BSB">
      <hr>
      <h2 class="h2 mb-3 font-weight-normal">SAEG</h2>      
      <h3 class="h3 mb-3 font-weight-normal">Sistema de Apoio às Atividades Extras da GEOPE/BSB</h3>
      <hr>
      <label for="matricula_login" class="sr-only">Matrícula</label>
      <input type="text" id="matricula_login" name="matricula_login" class="form-control" placeholder="Informe a sua Matrícula" required autofocus>
      <hr>
      <div id="myModal" class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title">Matrícula Inválida</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>A matrícula informada não foi encontrada.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
          </div>
        </div>
      </div>
    </div>

      <!--
      <label for="senha" class="sr-only">Senha</label>
      <input type="password" id="senha" class="form-control" placeholder="Senha" required>
      <button id="btn_entrar" onclick="return logar();" class="btn btn-lg btn-primary btn-block" type="submit">ENTRAR</button>
      -->
      <a href="#" onclick="javascript: logar();" class="btn btn-lg btn-primary btn-block">ENTRAR</a>
      
      <hr>
      <p class="mt-5 mb-3 text-muted">GEOPE SE/BSB</p>
    </form>
  </body>
</html>
