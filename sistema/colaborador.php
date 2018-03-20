<?php
include_once '../controle/auto_load.class.php';
new auto_load();
header("Content-Type: text/html; charset=UTF-8",true);

$acao = "";
//verifica passagem de acão
if(isset($_GET['acao'])){

	$acao = $_GET['acao'];
	$nome = "";
	$matricula = "";
	$lotacao = "";
	$telefone = "";
	$senha = "";
	$senha2 = "";
	
	
	
	if($acao == "cadastrar"){
		$unidades = new unidades();
		
		if(isset($_GET['nome'])){
			$unidades->setNome($_GET['nome']);
		}		
		if(isset($_GET['matricula'])){
			$unidades->setMatricula($_GET['matricula']);
		}
		if(isset($_GET['lotacao'])){
			$unidades->setLotacao($_GET['lotacao']);
		}
		if(isset($_GET['telefone'])){
			$unidades->setTelefone($_GET['telefone']);
		}
		if(isset($_GET['senha'])){
			$unidades->setSenha($_GET['senha']);
		}
		if(isset($_GET['senha2'])){
			$unidades->setSenha2($_GET['senha2']);
		}
	
		$cadastrar = $unidades->cadastrarColaborador();
		if($cadastrar){
			echo "CADASTRADO COM SUCESSO";
		}else{
			echo "ERRO";
		}
	}
	
	
	
	
//se não houver parametro unidade apresenta erro
}else{

	return false;

}




?>