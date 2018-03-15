<?php
$titulo = "Cadastrar Unidades";
include_once '../head.php';
?>
  <body>
  
	<!-- Cabeçalho -->
			<nav class="navbar navbar-dark bg-dark">			

				<h2 class="text-white">SAEG - Sistema de Apoio às Atividades Extras -  GEOPE SE/BSB</h2>
			  
			</nav>
			
			
	<div class="container-fluid">
		
		<form method="get" action="unidades.php">
		  <div class="form-group">
			<label for="nome">Nome da Unidade</label>
			<input type="text" name="nome" class="form-control" id="nome" placeholder="Nome da Unidade">
		  </div>
		  
		  <div class="input-group mb-3">
		  <div class="input-group-prepend">
			<label class="input-group-text" for="tipo_trabalho">Tipo do Trabalho</label>
		  </div>
		  <select class="custom-select" id="tipo_trabalho" name="tipo_trabalho">
			<option value="0" selected>Escolha Tipo do Trabalho</option>
			<option value="Tratamento">Tratamento</option>
			<option value="Distribuição">Distribuição</option>
		  </select>
		</div>
		  
		  <div class="form-group">
			<label for="endereco">Endereço da Unidade</label>
			<input type="text" name="endereco" class="form-control" id="endereco" placeholder="Endereço da Unidade">
		  </div>
		  <div class="form-group">
			<label for="gerente">Gerente</label>
			<input type="text" name="gerente" class="form-control" id="gerente" placeholder="Gerente">
		  </div>
		  <div class="form-group">
			<label for="matricula">Matrícula do Gerente:</label>
			<input type="text" name="matricula" class="form-control" id="matricula" placeholder="Matrícula do Gerente">
		  </div>
		  <div class="form-group">
			<label for="tel_gerente">Telefone do Gerente</label>
			<input type="text" name="tel_gerente" class="form-control" id="tel_gerente" placeholder="Telefone do Gerente">
		  </div>
		  <div class="form-group">
			<label for="tel_centro">Telefone do Centro</label>
			<input type="text" name="tel_centro" class="form-control" id="tel_centro" placeholder="Telefone do Centro">
		  </div>
		  <input type="hidden" name="acao" value="cadastrar">
		  <button id="btn_cadastrar_unidade" type="submit" class="btn btn-primary">Cadastrar</button>
		  <button id="btn_reset" type="reset" class="btn btn-warning">Limpar</button>
		</form>
		
	</div>
			
			
			
			
</body>
</html>