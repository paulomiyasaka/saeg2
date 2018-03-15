<?php
$titulo = "Listar Plantões";
include_once '../head.php';
?>

  <body>
  
  
      
      <nav class="navbar navbar-dark bg-dark">			

				<h2 class="text-white">SAEG - Sistema de Apoio às Atividades Extras -  GEOPE SE/BSB</h2>
			  
			</nav>
  

	<div class="container">

		<?php
			$plantao = new plantao();
			$plantao->botaoCadastrarPlantao();
		?>

	<div class="row justify-content-md-center">
	<div class="col-10 align-self-center">
	<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Plantões Ativos</h1>      
    </div>
	</div>
	</div>
	
	<div class="row justify-content-md-center">
	<div class="col-8 align-self-center">
	<p class="lead text-center"><b>Benefícios</b> - Para trabalhos aos sábados ou em trabalho no CTE durante a madrugada, desde que seja jornada dupla, o empregado terá direito a <b>uma folga</b>. Para trabalho aos domingos o empregado terá direito a <b>duas folgas.</b></p>
	</div>
	</div>
	<hr>
	<br>

	<div class="row justify-content-md-center">


		<?php 
		
		$plantao->listarPlantao();
	

		?>

	</div>

		<div class="modal fade" id="modalPlantao" tabindex="-1" role="dialog" aria-labelledby="cadastrarPlantao" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h3 class="modal-title text-center" id="cadastrarPlantao">Cadastrar Plantão</h3>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>


    <div class="modal-body">		
		<div class="container-fluid">
	
		<div class="row">
			<div class="col">
			<form method="get" action="plantao.php">
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
					<label class="input-group-text" for="tipo_trabalho">Unidade e Tipo de Trabalho</label>
				  </div>
				  <select class="custom-select" id="id_unidade" name="id_unidade"  style="height: 35px; width: 100%" required>
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
			<input type="text" name="data_inicio" class="form-control" id="data_inicio" placeholder="Data do Início do Turno" required>
		  </div>
		  </div>
		  
		  
		  <div class="col">
		  <div class="form-group">
			<label for="hora_inicio">Hora de Início:</label>
			<select class="form-control" style="height: 35px;" id="hora_inicio" name="hora_inicio" required>
			  <?php $plantao->gerarHorario(); ?>			  
			</select>
		  </div>
		  </div>
		  </div>
		  
		  <div class="row">
		  <div class="col">
		  <div class="form-group">
			<label for="data_final">Data Final:</label>
			<input type="text" name="data_final" class="form-control" id="data_final" placeholder="Data do Final do Turno" required>
		  </div>
		  </div>
		  
		  <div class="col">
		  <div class="form-group">
			<label for="hora_final">Hora do Término:</label>
			<select class="form-control" style="height: 35px;" id="hora_final" name="hora_final" required>
			  <?php $plantao->gerarHorario(); ?>	
			</select>
		  </div>
		  </div>
		  </div>
		  
		  <div class="row">
		  <div class="col">
		  <div class="form-group">
			<label for="vagas">Quantidade de Vagas Total</label>
			<input type="text" name="vagas" class="form-control" id="vagas" placeholder="Quantidade de Vagas" required>
		  </div> 
		</div>
		  <div class="col">
		  	<div class="form-group">
		  		<label class="custom-control-label">Precisará de motoristas?</label>
		  		<br>
		  		<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="motorista" id="exampleRadios1" value="0" checked>
				  <label class="form-check-label" for="exampleRadios1">
				    NÃO
				  </label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="motorista" id="exampleRadios2" value="1">
				  <label class="form-check-label" for="exampleRadios2">
				    SIM
				  </label>
				</div>	 		

		  	</div>		  	
			 </div>
			  </div>

		  <input type="hidden" name="acao" value="cadastrar">
		</form>
		
	</div>
		</div>
		      <div class="modal-footer">
		      	<button id="btn_cadastrar_plantao" type="submit" class="btn btn-success">Cadastrar</button>
		        
		        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
		      </div>
		    </div>
		  </div>
		</div>
	
	</div>
	
</body>
</html>