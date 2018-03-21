<?php
include_once 'auto_load.class.php';
new auto_load();
header("Content-Type: text/html; charset=UTF-8",true);

class plantao extends conecta{

	protected $id_unidade, $nome_unidade, $data_inicio, $data_final, $hora_inicio, $hora_final, $vagas, $tipo_trabalho, $motorista;
	
	public function setIdUnidade($valor){
		$this->id_unidade = $valor;		
	}	
	public function getIdUnidade(){
		return $this->id_unidade;		
	}
	
	public function setNomeUnidade($valor){
		$this->nome_unidade = $valor;		
	}	
	public function getNomeUnidade(){
		return $this->nome_unidade;		
	}
	
	public function setDataInicio($valor){
		$this->data_inicio = $valor;		
	}	
	public function getDataInicio(){
		return $this->data_inicio;		
	}
	
	public function setDataFinal($valor){
		$this->data_final = $valor;
		
	}	
	public function getDataFinal(){
		return $this->data_final;		
	}
	
	public function setHoraInicio($valor){
		$this->hora_inicio = $valor;		
	}	
	public function getHoraInicio(){
		return $this->hora_inicio;		
	}
	
	public function setHoraFinal($valor){
		$this->hora_final = $valor;		
	}	
	public function getHoraFinal(){
		return $this->hora_final;		
	}
	
	public function setVagas($valor){
		$this->vagas = $valor;
	}
	
	public function getVagas(){
		return $this->vagas;
	}

	public function setMotorista($valor){
		$this->motorista = $valor;
	}
	
	public function getMotorista(){
		return $this->motorista;
	}
	
	public function setTipoTrabalho($valor){
		$this->tipo_trabalho = $valor;
	}
	
	public function getTipoTrabalho(){
		return $this->tipo_trabalho;
	}
	
	//listar unidades disponíveis para cadastrar plantão
	public function listarUnidadesPlantao(){
		$unid = new unidades();
		$unidades = $unid->consultarUnidades();		
		$quant = count($unidades);
		$i = 0;
		
		foreach($unidades as $row){
			echo "<option value=\"$row->id_unidade\" selected>".$row->nome." - ".$row->trabalho."</option>";
		}
			
	
	}//listar unidades para o plantão
	
	
	
	//cadastrar plantão
	public function cadastrarPlantao(){
		
		$funcoes = new funcoes();
		
		$id_unidade = (int) $this->getIdUnidade();
		$data_inicio = $this->getDataInicio();
		$hora_inicio = $this->getHoraInicio();
		
		$dataInicioConverter = $funcoes->converterData($data_inicio);
		$horaInicioConverter = $funcoes->converterHora($hora_inicio);
		$turno_inicio = $dataInicioConverter ." ". $horaInicioConverter;
		$turno_inicio = date("Y-m-d H:i:s", strtotime($turno_inicio));
		
		$data_final = $this->getDataFinal();
		$hora_final = $this->getHoraFinal();
		
		$dataFinalConverter = $funcoes->converterData($data_final);
		$horaFinalConverter = $funcoes->converterHora($hora_final);
		$turno_final = $dataFinalConverter ." ". $horaFinalConverter;
		$turno_final = date("Y-m-d H:i:s", strtotime($turno_final));
		
		$vagas = (int) $this->getVagas();	
		$motorista = (int) $this->getMotorista();		
				
		$sql = "INSERT INTO plantao (id_unidade, turno_inicio, turno_final, vagas,motorista) VALUES (:id_unidade, :turno_inicio, :turno_final, :vagas, :motorista)";
		$dados = array(':id_unidade' => $id_unidade, ':turno_inicio' => $turno_inicio, ':turno_final' => $turno_final, ':vagas' => $vagas, ':motorista' => $motorista);
		
		//$cadastrar = acao::cadastrar($sql, $dados);
		$cadastrar = conecta::executarSQL($sql, $dados);
		$resultado = conecta::lastidSQL();
		echo "<script>alert($resultado)</script>";
		$retorno = "";
		if($resultado){	
			$retorno = "{'resultado':'true'}";						
		}else{
			$retorno = "{'resultado':'false'}";			
		}

		return $retorno;
	
	}//cadastrar plantão


	//gerar horários para o plantão
	public function gerarHorario(){

		echo "<option value='NULL' selected>Selecione um horário</option>";

		for($i = 0; $i <= 23; $i++){
			if($i < 10){
				echo "<option value='$i'>0".$i.":00</option>";
			}else{
				echo "<option value='$i'>".$i.":00</option>";
			}
			
		}

	

	}//gerar horario


	//listar plantões disponíveis
	public function listarPlantao(){

		
		$sql = "SELECT p.*, u.* FROM plantao as p INNER JOIN unidades as u ON p.id_unidade = u.id_unidade AND p.turno_final > now() WHERE p.status = :status ORDER BY p.turno_inicio";
		$dados = array(":status" => 1);
		$query = conecta::executarSQL($sql, $dados);
		$resultado = $query->fetchAll(PDO::FETCH_OBJ);
		$quant = $query->rowCount();

		if($quant > 0){				
			$i = 0;
			//while($i < $quant){

			foreach ($resultado as $row) {		


				$funcoes = new funcoes();
			    $data = $funcoes->montarDataPlantao($row->turno_inicio, $row->turno_final);
			    $id_plantao = $row->id_plantao;
			    $motorista = $row->motorista;
			    /*
			    if($motorista){
			    	$motorista = "Precisará de motoristas";
			    }else{
			    	$motorista = false;
			    }
				*/
			  echo "<div class=\"row justify-content-md-center\">
					<div class=\"col-sm-12 col-md-8 col-lg-6  align-self-center\">
					<div class=\"pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center\">
				      <h1 class=\"display-4\">Plantões Ativos</h1>      
				    </div>
					</div>
					</div>
					
					<div class=\"row justify-content-md-center\">
					<div class=\"col-sm-12 col-md-8 col-lg-6  align-self-center\">
					<p class=\"lead text-justify\"><b>Benefícios</b> - Para trabalhos aos sábados ou em trabalho no CTE durante a madrugada, desde que seja jornada dupla, o empregado terá direito a <b>uma folga</b>. Para trabalho aos domingos o empregado terá direito a <b>duas folgas.</b></p>
					</div>
					</div>
					<hr>
					<br>";


			echo "<div class=\"row justify-content-md-center\">
			<div class=\"col-sm-12 col-md-6 col-lg-4 text-center\" style=\"margin-top: 15px; margin-bottom: 15px;\">
			<div class=\"card\">
			  <div class=\"card-body border border-dark\">
			  	<div class=\"alert alert-secondary\" role=\"alert\">
			    <h3 class=\"card-title\">".$row->nome." - ".$row->trabalho."</h3>
			    <h4 class=\"card-subtitle mb-2 text-muted\">".$row->endereco."</h4>
			    </div>			    			    
			    <hr>";
			    
			    

			echo "<h4 class=\"card-text text-center\">".$data."</h4><br>
			    <h5 class=\"card-text text-left\">Gerente: ".$row->gerente."</h5>
			    <h5 class=\"card-text text-left\">Telefone: ".$row->tel_gerente."</h5>
			    <h5 class=\"card-text text-left\">Telefone: ".$row->tel_centro."</h5><hr>";
			    /*
			    if($motorista){
			    	echo "<h4 class=\"card-subtitle mb-2 alert alert-primary\" role=\"alert\">".$motorista."</h4><hr>";
			    }
			    */
			    //echo "<a href=\"#\" class=\"btn btn-primary card-link text-center\">Inscrever-se</a>";
			//echo "<button id=\"inscrever_plantao\" type=\"button\" class=\"btn btn-primary card-link text-center\" data-toggle=\"modal\" data-target=\"#modalInscrever\" onclick=\"idPlantao(".$row->id_plantao.");\">Inscrever-se</button>";		    

			if(isset($_SESSION['matricula'])){

				$matricula = $_SESSION['matricula'];


				$id_colaborador = $this->verificarMatricula($matricula);


			$cadastrado = $this->verificarCadastroPlantao($id_colaborador, $row->id_plantao);
			

			if($cadastrado){
				echo "<button id=\"cancelar_inscrever_plantao\" type=\"button\" class=\"btn btn-danger card-link text-center\" data-toggle=\"modal\" data-target=\"#modalCancelInscrever\" onclick=\"idPlantao(".$row->id_plantao.");\">Cancelar</button>";
			}else{
				echo "<button id=\"inscrever_plantao\" type=\"button\" class=\"btn btn-primary card-link text-center\" data-toggle=\"modal\" data-target=\"#modalInscrever\" onclick=\"idPlantao(".$row->id_plantao.");\">Inscrever-se</button>";
			}

			$adm = $this->verificarAdministrador($matricula);
				if($adm){
					 echo "<button id=\"btn_inscritos\" type=\"button\" class=\"btn btn-info card-link\" onclick=\"verInscritos(".$id_plantao.");\">Vagas Disponíveis: <span class=\"badge badge-light\">". $this->contarVagas($id_plantao) ."</span></button>";
				}else{
					 echo "<button type=\"button\" class=\"btn btn-secundary card-link\">Vagas Disponíveis: <span class=\"badge badge-light\">". $this->contarVagas($id_plantao) ."</span></button>";
				}
			}
			
			  echo "</div>
			  		</div>
					</div>
					</div>
					<hr>
					<br>";

			$i++;
			
			//}

			}


		}else{
			echo "<div class=\"col-12 align-self-center\"><div class=\"pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center\"><h1 class=\"display-4\">Não Há Plantões Ativos</h1></div></div>";

		}
	}//listar plantao



	//contar vagas disponíveis
	public function contarVagas($id_plantao){
		
		$sql = "SELECT vagas FROM plantao WHERE id_plantao = :id_plantao AND status = :status";
		$dados = array(":id_plantao" => $id_plantao, ":status" => 1);
		$query = conecta::executarSQL($sql, $dados);
		$vagas = $query->fetchAll(PDO::FETCH_OBJ);


		$sql =  "SELECT COUNT(id_plantao) AS quant FROM cadastrados WHERE id_plantao = :id_plantao AND status = :status";
		$dados = array(":id_plantao" => $id_plantao, ":status" => 1);
		$query = conecta::executarSQL($sql, $dados);
		$quant = $query->fetchAll(PDO::FETCH_OBJ);
		
		foreach ($vagas as $row) {

			$vagas = $row->vagas;
		}

		foreach ($quant as $row) {

			$quant = $row->quant;
		}

		return ($vagas - $quant) . " / " . $vagas;
	}

	//verificar se é administrador
	public function verificarAdministrador($matricula){
		$sql = "SELECT a.id_administrador, a.id_colaborador FROM administrador AS a LEFT JOIN colaboradores AS c ON a.id_colaborador = c.id_colaborador WHERE c.matricula = :matricula AND a.status = :status";

			$dados = array(':matricula' => $matricula, ":status" => 1);
			$query = conecta::executarSQL($sql, $dados);
			//$resultado = $query->fetchAll(PDO::FETCH_OBJ);		

			$result = $query->rowCount();
			if($result){
				$result = true;
			}else{
				$result = false;
			}

			return $result;
	}


//verificar se o colaborador já está cadastrado no plantao
	public function verificarCadastroPlantao($id_colaborador, $id_plantao){

		$sql = "SELECT id_cadastrado FROM cadastrados WHERE id_plantao = :id_plantao AND id_colaborador = :id_colaborador";

			$dados = array(':id_plantao' => $id_plantao, ':id_colaborador' => $id_colaborador);

			$query = conecta::executarSQL($sql, $dados);
			$resultado = $query->fetchAll(PDO::FETCH_OBJ);
			$result = "";		
			foreach ($resultado as $row) {
				$result = $row->id_cadastrado;
			}
			
			if($result){
				$result = true;
			}else{
				$result = false;
			}
			
			return $result;
	}


	//botao cadastrar - deve ser apresentado somente para os administradores do sistema
	public function botaoCadastrarPlantao(){

		if(isset($_SESSION['matricula'])){
			$matricula = $_SESSION['matricula'];

			//$sql = "SELECT c.id_colaborador FROM colaboradores AS c LEFT JOIN a.id_aministrador  WHERE c.matricula = :matricula";
			$adm = $this->verificarAdministrador($matricula);
			
			if($adm){
				echo "<div class=\"row justify-content-md-center\">
					<div class=\"col-8  text-center\">
					<h4>Clique no botão abaixo para cadastrar um novo plantão ou uma unidade.</h4><br>
					</div>
					</div>

					<div class=\"row justify-content-around\">
					<div class=\"col-5 text-center\">						
						<button type=\"button\" class=\"btn btn-outline-info border-info\" data-toggle=\"modal\" data-target=\"#modalPlantao\">Cadastrar Plantão</button>

					</div>
					<div class=\"col-5 text-center\">
						<button type=\"button\" class=\"btn btn-outline-info border-info\" data-toggle=\"modal\" data-target=\"#modalUnidade\">Cadastrar Unidade</button>

					</div>
					</div>";

			}
		}else{
			echo "<script> window.location.href='../index.php';</script>";
		}

		
	}



	public function verificarMatricula($matricula){

		$sql = "SELECT id_colaborador FROM colaboradores WHERE matricula = :matricula AND status = :status";
			$dados = array(":matricula"  => $matricula, ":status" => 1);

			$query = conecta::executarSQL($sql, $dados);
			$resultado = $query->fetch(PDO::FETCH_OBJ);
			$quant = $query->rowCount();
			if($quant){
				return (int) $resultado->id_colaborador;
			}else{
				return false;
			}

	}


	public function cadastrarInscricao($id_colaborador, $id_plantao, $motorista){
		
		$sql = "INSERT INTO cadastrados (id_colaborador, id_plantao, motorista) VALUES (:id_colaborador, :id_plantao, :motorista)";
			$dados = array(":id_colaborador" => $id_colaborador, ":id_plantao"  => $id_plantao, ":motorista"  => $motorista);

			$cadastro = $this->verificarCadastroPlantao($id_colaborador, $id_plantao);

			if($cadastro != "false"){

				$query = conecta::executarSQL($sql, $dados);
				$resultado = $query->fetch(PDO::FETCH_OBJ);
				$quant = conecta::lastidSQL();
				if($quant){
					return (int) $quant;
				}else{
					return false;
				}


			}else{
				return false;
			}
			


	}




	public function motorista($id_plantao){

		$sql = "SELECT motorista FROM plantao WHERE id_plantao = :id_plantao AND status = :status";
			$dados = array(":id_plantao"  => $id_plantao, ":status" => 1);

			$query = conecta::executarSQL($sql, $dados);
			$resultado = $query->fetch(PDO::FETCH_OBJ);
			$quant = $query->rowCount();
			if($quant){
				return $resultado;
			}else{
				return false;
			}


	}


	public function carteiraMotorista(){

		echo "<hr>	
			<label class=\"custom-control-label\"><h4>Você possui carteira de motorista?</h4></label>
	  		<br>
	  		<div class=\"form-check form-check-inline\">
			  <input class=\"form-check-input\" type=\"radio\" id=\"inlineCheckbox1\" name=\"motor\" value=\"0\" checked>
			  <label class=\"form-check-label\" for=\"inlineCheckbox1\"> NÃO </label>
			</div>
			<div class=\"form-check form-check-inline\">
			  <input class=\"form-check-input\" type=\"radio\" id=\"inlineCheckbox1\" name=\"motor\" value=\"1\">
			  <label class=\"form-check-label\" for=\"inlineCheckbox1\"> SIM </label>
			</div>";



	}



	public function cancelarInscricao($id_plantao, $matricula){
			
			$id_colaborador = $this->verificarMatricula($matricula);

			$sql = "DELETE FROM cadastrados WHERE id_colaborador = :id_colaborador AND id_plantao = :id_plantao";

			//$sql = "UPDATE cadastrados SET status = :status WHERE id_plantao = :id_plantao AND id_colaborador = :id_colaborador";
			$dados = array(":id_colaborador" => $id_colaborador, ":id_plantao" => $id_plantao);

			$query = conecta::executarSQL($sql, $dados);
			//$resultado = $query->fetch();
			//$quant = conecta::lastidSQL();
			
			if($query){
				return true;
			}else{
				return false;
			}


	}




	public function verInscritos($id_plantao){

		$sql = "SELECT cad.id_colaborador, colab.nome, colab.lotacao FROM cadastrados AS cad INNER JOIN colaboradores AS colab ON cad.id_colaborador = colab.id_colaborador WHERE cad.id_plantao = :id_plantao";
		$dados = array(":id_plantao" => $id_plantao);

		$query = conecta::executarSQL($sql, $dados);
		$resultado = $query->fetchAll(PDO::FETCH_OBJ);
		$quant = $query->rowCount();
			
		if($quant > 0){
			return $resultado;

		}else{
			return false;
		}

		

	}
	
	




}


?>

