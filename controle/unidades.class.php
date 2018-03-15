<?php
include_once 'auto_load.class.php';
new auto_load();

class unidades extends acao{

	protected $nome, $trabalho, $endereco, $gerente, $matricula, $tel_gerente, $tel_centro;
	
	public function setNome($value){
		$this->nome = $value;
	}
	public function getNome(){
		return $this->nome;
	}
	
	public function setTrabalho($value){
		$this->trabalho = $value;
	}
	public function getTrabalho(){
		return $this->trabalho;
	}
	
	public function setEndereco($value){
		$this->endereco = $value;
	}
	public function getEndereco(){
		return $this->endereco;
	}
	
	public function setGerente($value){
		$this->gerente = $value;
	}
	public function getGerente(){
		return $this->gerente;
	}

	public function setMatricula($value){
		$this->matricula = $value;
	}
	public function getMatricula(){
		return $this->matricula;
	}
	
	public function setTelGerente($value){
		$this->tel_gerente = $value;
	}
	public function getTelGerente(){
		return $this->tel_gerente;
	}
	
	public function setTelCentro($value){
		$this->tel_centro = $value;
	}
	public function getTelCentro(){
		return $this->tel_centro;
	}
	
	//consultar unidades cadastradas
	public function consultarUnidades(){
		
		$acao = acao::consultarUnidades();
		$quant = count($acao);
		$i = 0;
		
		foreach($acao as $row){
			
			echo "<tr>
					<th scope='row'><a href='detalhar/ctei.php' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-pencil'></span>Inscrever</a></th>
					<td>$row->nome</td>
					<td>$row->trabalho</td>
					<td>$row->endereco</td>
					<td>$row->gerente</td>
					<td>$row->tel_gerente</td>
					<td>$row->tel_centro</td>
					</tr>";
		
		}		
	
	}//consultar unidades
	
	
	
	//cadastrar unidades
	public function cadastrarUnidades(){
	
		$nome = $this->getNome();
		$trabalho = $this->getTrabalho();
		$endereco = $this->getEndereco();
		$gerente = $this->getGerente();
		$matricula = $this->getMatricula();
		$tel_gerente = $this->getTelGerente();
		$tel_centro = $this->getTelCentro();
		
		
		$sql = "INSERT INTO unidades (nome, trabalho, endereco, gerente, matricula, tel_gerente, tel_centro) VALUES (:nome, :trabalho, :endereco, :gerente, :matricula, :tel_gerente, :tel_centro)";
		$dados = array(':nome' => $nome, ':trabalho' => $trabalho, ':endereco' => $endereco, ':gerente' => $gerente, ':matricula' => $matricula, ':tel_gerente' => $tel_gerente, ':tel_centro' => $tel_centro);
		$cadastrar = acao::cadastrar($sql, $dados);
		if($cadastrar){
			return $cadastrar;
		}else{
			return false;
		}
	
	}//cadastrar unidades
	
	
	
	
	
	
	

}//class


?>