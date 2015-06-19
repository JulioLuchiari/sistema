<?php
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
 		return NULL;
 	}
 	
 	public function altera($id)
 	{
 		return NULL;
 	}
 	
 	public function deleta($id)
 	{
 		return NULL;
 	}
 }