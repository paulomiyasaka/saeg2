<?php
include_once '../controle/auto_load.class.php';
new auto_load();
		
	$matricula = NULL;	

	//se informar a matricula
	if(isset($_POST['matricula_login']) && $_POST['matricula_login'] != "" && $_POST['matricula_login'] != NULL){

		$funcoes = new funcoes();
		$login = new login();
		$login->setMatricula($funcoes->somenteNumero($_POST['matricula_login']));		
		$usuario = $login->logar();
		
		if($usuario){
			var_dump($usuario);			
		}else{			
			return false;
		}		


	//se não informar a matricula
	}else{
		return false;
	}







?>