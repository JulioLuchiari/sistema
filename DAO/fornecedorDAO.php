<?php
if (eregi("produto.class.php", $_SERVER['SCRIPT_NAME']))
{
	header("Location: ../index.php");
	die();
}

class FornecedorDAO
{
 	private $conn;
 	
 	public function __construct($conn)
 	{
 		$this->conn = $conn;
 	}
 	
 	public function buscaTodos()
 	{
 		$fornecedores = array();
 		
 		$query = "SELECT * FROM fornecedores";
 		$resultado = mysqli_query($this->conn, $query);
 		
 		while($a = mysqli_fetch_assoc($resultado))
 		{
 			$fornBuilder = new FornecedorBuilder();
 			$fornBuilder->comCnpj($a['forn_cnpj']);
 			$fornBuilder->comEmail($a['forn_email']);
 			$fornBuilder->comEndereco($a['forn_rua'], $a['forn_numero'], $a['forn_bairro'], $a['forn_cidade'], 
 									  $a['forn_uf'], $a['forn_pais'], $a['forn_cep'], $a['forn_complemento']);
 			$fornBuilder->comRazaoSocial($a['forn_razaosoc']);
 			$fornBuilder->comTelefone($a['forn_fone']);
 			$fornecedor = $fornBuilder->build();
 			$fornecedor->setId($a['forn_id']);
 			
 			array_push($fornecedores, $fornecedor);
 		}
 		
 		return $fornecedores;
 	}
 	
 	public function busca($id)
 	{
 		$id = mysqli_real_escape_string($this->conn, $id);
 		$resultado = $this->verificaFornecedor($id);
 		if($resultado)
 		{
 			$a = mysqli_fetch_assoc($resultado);
 		
 			$fornBuilder = new FornecedorBuilder();
 			$fornBuilder->comCnpj($a['forn_cnpj']);
 			$fornBuilder->comEmail($a['forn_email']);
 			$fornBuilder->comEndereco($a['forn_rua'], $a['forn_numero'], $a['forn_bairro'], $a['forn_cidade'], 
 									  $a['forn_uf'], $a['forn_pais'], $a['forn_cep'], $a['forn_complemento']);
 			$fornBuilder->comRazaoSocial($a['forn_razaosoc']);
 			$fornBuilder->comTelefone($a['forn_fone']);
 			$fornecedor = $fornBuilder->build();
 			$fornecedor->setId($id);
 				
 			return $fornecedor;
 		}
 		else
 		{
 			return false;
 		}
 	}
 	
 	public function verificaFornecedor($id)
 	{
 		$query = "SELECT * FROM fornecedores WHERE forn_id = '{$id}'";
 		$resultado = mysqli_query($this->conn, $query);
 			
 		if(mysqli_num_rows($resultado) != 1)
 		{
 			return false;
 		}
 		else 
 		{
 			return $resultado;
 		}
 	}
 	
 	public function salva(Fornecedor $fornecedor)
 	{
 		$cnpj = mysqli_real_escape_string($this->conn, $fornecedor->getCnpj());
 		$razaoSocial = mysqli_real_escape_string($this->conn, $fornecedor->getRazaoSocial());
 		$rua = mysqli_real_escape_string($this->conn, $fornecedor->getRua());
 		$numero = mysqli_real_escape_string($this->conn, $fornecedor->getNumero());
 		$complemento = mysqli_real_escape_string($this->conn, $fornecedor->getComplemento());
 		$cep = mysqli_real_escape_string($this->conn, $fornecedor->getCep());
 		$bairro = mysqli_real_escape_string($this->conn, $fornecedor->getBairro());
 		$cidade = mysqli_real_escape_string($this->conn, $fornecedor->getCidade());
 		$uf = mysqli_real_escape_string($this->conn, $fornecedor->getUf());
 		$pais = mysqli_real_escape_string($this->conn, $fornecedor->getPais());
 		$telefone = mysqli_real_escape_string($this->conn, $fornecedor->getTelefone());
 		$email = mysqli_real_escape_string($this->conn, $fornecedor->getEmail());
 		
 		$query = "INSERT INTO fornecedores(forn_cnpj, forn_razaosoc, forn_rua, forn_numero, forn_complemento, "
 				."forn_cep, forn_bairro, forn_cidade, forn_uf, forn_pais, forn_fone, forn_email) VALUES "
 				."('{$cnpj}', '{$razaoSocial}', '{$rua}', {$numero}, '{$complemento}', '{$cep}', '{$bairro}', '{$cidade}', '{$uf}', '{$pais}', '{$telefone}', '{$email}')";
 		return mysqli_query($this->conn, $query);
 	}
 	
 	public function altera($id, Fornecedor $f)
 	{
 		$id = mysqli_real_escape_string($this->conn, $id);
 		$resultado = $this->verificaFornecedor($id);
 		
 		if($resultado)
 		{
 			$cnpj = mysqli_real_escape_string($this->conn, $f->getCnpj());
 			$razaoSocial = mysqli_real_escape_string($this->conn, $f->getRazaoSocial());
 			$rua = mysqli_real_escape_string($this->conn, $f->getRua());
 			$numero = mysqli_real_escape_string($this->conn, $f->getNumero());
 			$complemento = mysqli_real_escape_string($this->conn, $f->getComplemento());
 			$cep = mysqli_real_escape_string($this->conn, $f->getCep());
 			$bairro = mysqli_real_escape_string($this->conn, $f->getBairro());
 			$cidade = mysqli_real_escape_string($this->conn, $f->getCidade());
 			$uf = mysqli_real_escape_string($this->conn, $f->getUf());
 			$pais = mysqli_real_escape_string($this->conn, $f->getPais());
 			$telefone = mysqli_real_escape_string($this->conn, $f->getTelefone());
 			$email = mysqli_real_escape_string($this->conn, $f->getEmail());
 			
 			$query = "UPDATE fornecedores SET forn_cnpj = '{$cnpj}', forn_razaosoc = '{$razaoSocial}', forn_rua = '{$rua}', "
 					."forn_numero = '{$numero}', forn_complemento = '{$complemento}', forn_cep = '{$cep}', forn_bairro = '{$bairro}', "
 					."forn_cidade = '{$cidade}', forn_uf = '{$uf}', forn_pais = '{$pais}', forn_fone = '{$telefone}', "
 					."forn_email = '{$email}' WHERE forn_id = {$id}";
 			return mysqli_query($this->conn, $query);
 		}
 		else
 		{
 			return false;
 		}
 	}
 	
 	public function remove($id)
 	{
 		$id = mysqli_real_escape_string($this->conn, $id);
 		if($this->verificaFornecedor($id))
 		{
	 		$query = "DELETE FROM fornecedores WHERE forn_id = {$id}";
	 		return mysqli_query($this->conn, $query);
 		}
 		else
 		{
 			return false;
 		}
 	}
}