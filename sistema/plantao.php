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

		$id_plantao = $_REQUEST['id_plantao'];
		if(isset($_SESSION['matricula'])){

			$sql = "SELECT id_colaborador FROM colaboradores WHERE matricula = :matricula";
			$dados = array(":matricula"  => $matricula);

			$query = conecta::executarSQL($sql, $dados);
			$resultado = $query->fetchAll(PDO::FETCH_OBJ);
			//$quant = conecta::lastidSQL();

		}


		var_dump(json_encode($resultado));
		

	}
	
	

//se não houver parametro acao apresenta erro	
}else{

	return false;

}




?>