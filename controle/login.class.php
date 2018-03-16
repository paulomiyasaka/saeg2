<?php

include_once 'auto_load.class.php';
new auto_load();

class login extends conecta{

	protected $matricula;

	public function setMatricula($valor){
		$this->matricula = $valor;
	}

	public function getMatricula(){
		return $this->matricula;
	}


	public function logar(){

		$usuario = $this->getMatricula();

		$sql = "SELECT * FROM colaboradores WHERE matricula = :matricula AND status = :status";
		$dados = array(":matricula" => $usuario, ":status" => 1);

		$query = conecta::executarSQL($sql, $dados);
		$resultado = $query->fetchAll(PDO::FETCH_OBJ);
		$quant = $query->rowCount();		
		if($quant == 1){

			foreach ($resultado as $row) {
				session_start();
				$_SESSION['matricula'] = $row->matricula;
				$_SESSION['nome'] = $row->nome;
				$_SESSION['lotacao'] = $row->lotacao;
				$_SESSION['funcao'] = $row->funcao;
				$_SESSION['time'] = date('Y-m-d H:i:s');
			}
									
			//return $resultado;			
			return $quant;
		}else{
			return false;
		}



	}



}



?>