<?php
include_once '../controle/auto_load.class.php';
new auto_load();
header("Content-Type: text/html; charset=UTF-8",true);

$acao = "";
//verifica passagem de acão
if(isset($_GET['acao'])){

	$acao = $_GET['acao'];
	$id_unidade = "";
	$data_inicio = "";
	$hora_inicio = "";
	$data_final = "";
	$hora_final = "";
	$vagas = "";
	
	
	if($acao == "cadastrar"){
		$plantao = new plantao();
		
		if(isset($_GET['id_unidade'])){
			$plantao->setIdUnidade($_GET['id_unidade']);
		}		
		if(isset($_GET['data_inicio'])){
			$plantao->setDataInicio($_GET['data_inicio']);
		}
		if(isset($_GET['hora_inicio'])){
			$plantao->setHoraInicio($_GET['hora_inicio']);
		}
		if(isset($_GET['data_final'])){
			$plantao->setDataFinal($_GET['data_final']);
		}
		if(isset($_GET['hora_final'])){
			$plantao->setHoraFinal($_GET['hora_final']);
		}
		if(isset($_GET['vagas'])){
			$plantao->setVagas($_GET['vagas']);
		}
		if(isset($_GET['motorista'])){
			$plantao->setMotorista($_GET['motorista']);
		}else{
			$plantao->setMotorista("0");
		}
		$m = $plantao->getMotorista();
		$cadastrar = $plantao->cadastrarPlantao();
		if($cadastrar){
			echo "CADASTRADO COM SUCESSO";
		}else{
			echo "ERRO";
		}
	}
	
	
	
	
//se não houver parametro acao apresenta erro
}else{

	return false;

}




?>