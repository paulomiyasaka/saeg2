<?php
$titulo = "Cadastrar Plantão";
include_once '../head.php';
?>
  <body>
  
	<!-- Cabeçalho -->
			<nav class="navbar navbar-dark bg-dark">			

				<h2 class="text-white">SAEG - Sistema de Apoio às Atividades Extras -  GEOPE SE/BSB</h2>
			  
			</nav>
			
	<div class="modal-body">		
	<div class="container-fluid">
	
		<div class="row">
			<div class="col">
			<form method="get" action="plantao.php">
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
					<label class="input-group-text" for="tipo_trabalho">Unidade e Tipo de Trabalho</label>
				  </div>
				  <select class="custom-select" id="id_unidade" name="id_unidade">
				<option value="0" selected>Escolha a Unidade</option>
				
			<?php
				$plantao = new plantao();
				$plantao->listarUnidadesPlantao();
				
			?> 
			  </select>
			</div>
			</div>
		</div>
		
		  <div class="row">
		  <div class="col">
		  <div class="form-group">
			<label for="data_inicio">Data Inicial:</label>
			<input type="text" name="data_inicio" class="form-control" id="data_inicio" placeholder="Data do Início do Turno">
		  </div>
		  </div>
		  
		  
		  <div class="col">
		  <div class="form-group">
			<label for="hora_inicio">Hora de Início:</label>
			<select class="form-control" id="hora_inicio" name="hora_inicio">
			  <?php $plantao->gerarHorario(); ?>			  
			</select>
		  </div>
		  </div>
		  </div>
		  
		  <div class="row">
		  <div class="col">
		  <div class="form-group">
			<label for="data_final">Data Final:</label>
			<input type="text" name="data_final" class="form-control" id="data_final" placeholder="Data do Final do Turno">
		  </div>
		  </div>
		  
		  <div class="col">
		  <div class="form-group">
			<label for="hora_final">Hora do Término:</label>
			<select class="form-control" id="hora_final" name="hora_final">
			  <?php $plantao->gerarHorario(); ?>	
			</select>
		  </div>
		  </div>
		  </div>
		  
		  <div class="row">
		  <div class="col-3">
		  <div class="form-group">
			<label for="vagas">Quantidade de Vagas Total</label>
			<input type="text" name="vagas" class="form-control" id="vagas" placeholder="Quantidade de Vagas">
		  </div> 
		</div>
		  <div class="col-6">
		  	<div class="form-group">
		  	<input class="form-check-input" type="checkbox" value="1" id="motorista" name="motorista">
			  <label class="form-check-label" for="motorista"> Este plantão NECESSISTARÁ de motoristas.</label>		  		 		
		  	</div>
		 </div>
		  </div>

		  <div class="row">
		  <div class="col">
		  <input type="hidden" name="acao" value="cadastrar">
		  <button id="btn_cadastrar_plantao" type="submit" class="btn btn-primary">Cadastrar</button>
		  </div>
		  <div class="col">
		  <button id="btn_reset" type="reset" class="btn btn-warning">Limpar</button>
		  </div>
		  </div>
		  
		</form>
		
	</div>
		</div>	
			
			
			
</body>
</html>