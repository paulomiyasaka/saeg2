<?php
include_once '../controle/auto_load.class.php';
new auto_load();
header("Content-Type: text/html; charset=UTF-8",true);

$acao = "";
//verifica passagem de acão
if(isset($_REQUEST['acao'])){

	$acao = $_REQUEST['acao'];
	$id_unidade = "";
	$data_inicio = "";
	$hora_inicio = "";
	$data_final = "";
	$hora_final = "";
	$vagas = "";
	
	
	if($acao == "cadastrar"){
		$plantao = new plantao();
		
		if(isset($_REQUEST['id_unidade'])){
			$plantao->setIdUnidade($_REQUEST['id_unidade']);
		}		
		if(isset($_REQUEST['data_inicio'])){
			$plantao->setDataInicio($_REQUEST['data_inicio']);
		}
		if(isset($_REQUEST['hora_inicio'])){
			$plantao->setHoraInicio($_REQUEST['hora_inicio']);
		}
		if(isset($_REQUEST['data_final'])){
			$plantao->setDataFinal($_REQUEST['data_final']);
		}
		if(isset($_REQUEST['hora_final'])){
			$plantao->setHoraFinal($_REQUEST['hora_final']);
		}
		if(isset($_REQUEST['vagas'])){
			$plantao->setVagas($_REQUEST['vagas']);
		}
		if(isset($_REQUEST['motorista'])){
			$plantao->setMotorista($_REQUEST['motorista']);
		}else{
			$plantao->setMotorista("0");
		}
		$m = $plantao->getMotorista();
		$cadastrar = $plantao->cadastrarPlantao();
		
		var_dump(json_encode($cadastrar));


		//LISTAR PLANTÕES
	}else if($acao == "listar"){

		$matricula = NULL;

		if(isset($_REQUEST['matricula'])){
			$matricula = $_REQUEST['matricula']	;
		}
		session_start();
		$_SESSION['matricula'] = $matricula;
		echo "<script>window.location.href='listar_plantao.php';</script>";
	




	}else if($acao == "inscrever"){

		$id_plantao = $_REQUEST["id_plantao"];
		$motorista = $_REQUEST["motorista"];
		
		session_start();
		if(isset($_SESSION["matricula"])){
			$matricula = $_SESSION['matricula'];			

			$plantao = new plantao();
			$id_colaborador = $plantao->verificarMatricula($matricula);

			if($id_colaborador != false){
				$resultado = $plantao->cadastrarInscricao($id_colaborador, $id_plantao, $motorista);
				
					var_dump(json_encode($resultado));
				

			}
			
			

		}


		
	}else if($acao == "cancelar"){

		$id_plantao = $_REQUEST["id_plantao"];
		session_start();

		if(isset($_SESSION["matricula"])){
			$matricula = $_SESSION['matricula'];

			$plantao = new plantao();
			$resultado = $plantao->cancelarInscricao($id_plantao, $matricula);

			if($resultado != false){
				
				var_dump(json_encode($resultado));
			
		}


	}
		




	}else if($acao == "verificar"){

		$id_plantao = $_REQUEST["id_plantao"];
		$plantao = new plantao();
		$motorista = $plantao->motorista($id_plantao);

		$retorno = "";
		if($motorista){	
			$retorno = "{'resultado':'true'}";						
		}else{
			$retorno = "{'resultado':'false'}";			
		}

		var_dump(json_encode($retorno));



	}else if($acao == "listar_inscritos"){

		$id_plantao = $_REQUEST["id_plantao"];
		$plantao = new plantao();
		$lista = $plantao->verInscritos($id_plantao);


		$retorno = "";
		if($lista){	
			$retorno = $lista;						
		}else{
			$retorno = "{'resultado':'false'}";			
		}

		var_dump(json_encode($retorno));

	}
	
	

//se não houver parametro acao apresenta erro	
}else{

	return false;

}




?>