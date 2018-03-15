<?php
$titulo = "Cadastrar Colaborador";
include_once '../head.php';
?>

  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
        <img class="mb-4" src="http://correios.com.br/++theme++correios.site.tema/images/logo_correios.png" alt="Correios" title="SAEG - GEOPE SE/BSB">
        <h2>Bem vindo!</h2>
        <p class="lead">Informe nos campos abaixo o seu nome, matrícula, lotação, telefone e senha para entrar no sistema.</p>
      </div>

      <div class="row">
        <div class="col-md-6">
          <form class="needs-validation" required>
            <div class="form-group">
              <label for="nome">Nome:</label>
              <input type="text" class="form-control" id="nome" name="nome" placeholder="Informe o seu nome" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
              <label for="matricula">Matrícula</label>
              <input type="password" class="form-control" id="matricula" name="matricula" placeholder="Matrícula" required>
            </div>
          </div>
        </div>
         <div class="row">
        <div class="col-md-6">
            <div class="form-check">
              <label for="lotacao">Lotação</label>
              <input type="password" class="form-control" id="lotacao" name="lotacao" placeholder="Lotação" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-check">
              <label for="telefone">Telefone</label>
              <input type="password" class="form-control" id="telefone" name="telefone" placeholder="Telefone" required>
            </div>
          </div>
        </div>
        <div class="row">
        <div class="col-md-6">
            <div class="form-check">
              <label for="senha">Informe uma senha</label>
              <input type="password" class="form-control" id="senha" name="senha" placeholder="Informe uma senha" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-check">
              <label for="senha2">Repita a senha</label>
              <input type="password" class="form-control" id="senha2" name="senha2" placeholder="Repita a senha" required>
            </div>
          </div>
        </div>
        <hr>
        <div class="row">
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>          
        </div>
        <div class="col-md-6">
            <a href="../index.php" class="btn btn-warning btn-block">Cancelar</a>          
        </div>
      </div>
    </form>
  </div>
</div>
</div>
</body>
</html>
