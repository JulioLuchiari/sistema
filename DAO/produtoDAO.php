<?php
//bloqueia acesso direto pela url
if (eregi("produtoDAO.php", $_SERVER['SCRIPT_NAME']))
{
	header("Location: ../index.php");
	die();
}

//classe que faz acesso ao banco de dados de produtos
class ProdutoDAO
{
 	private $conn;
 	
 	public function __construct($conn)
 	{
 		$this->conn = $conn;
 	}
 	
 	//busca o produto no banco de dados, se existir, o retorna, caso contrario retorna falso
 	public function verificaProduto($id)
 	{
 		$query = "SELECT * FROM produto WHERE prod_id = '{$id}'";
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
 	
 	//grava um novo produto no banco de dados
 	public function salva(Produto $p)
 	{
 		$nome = mysqli_real_escape_string($this->conn, $p->getNome());
 		$valorUnit = mysqli_real_escape_string($this->conn, $p->getValorUnitario());
 		$descricao = mysqli_real_escape_string($this->conn, $p->getDescricao());
 		$qtdEstoque = mysqli_real_escape_string($this->conn, $p->getQtdEstoque());
 		$tipo = mysqli_real_escape_string($this->conn, $p->getTipo());
 		$valorVenda = mysqli_real_escape_string($this->conn, $p->getValorVenda());
 		$desconto = mysqli_real_escape_string($this->conn, $p->getDesconto());
 		$fornId = mysqli_real_escape_string($this->conn, $p->getFornId());
 		
 		$query = "INSERT INTO produto(forn_id, prod_nome, prod_valorunit, prod_valorvenda, prod_desconto, prod_desc, prod_tipo, prod_qtdEstoque) "
 				."VALUES({$fornId}, '{$nome}', {$valorUnit}, {$valorVenda}, {$desconto}, '{$descricao}', '{$tipo}', {$qtdEstoque})";
 		return mysqli_query($this->conn, $query);
 	}
 	
 	//busca e retorna todos os produtos
 	public function buscaTodos()
 	{
 		$produtos = array();
 			
 		$query = "SELECT * FROM produto";
 		$resultado = mysqli_query($this->conn, $query);
 			
 		while($a = mysqli_fetch_assoc($resultado))
 		{
 			$p = new Produto();
 			$p->setId($a['prod_id']);
 			$p->setNome($a['prod_nome']);
 			$p->setDescricao($a['prod_desc']);
 			$p->setDesconto($a['prod_desconto']);
 			$p->setValorUnitario($a['prod_valorunit']);
 			$p->setQtdEstoque($a['prod_qtdestoque']);
 			$p->setTipo($a['prod_tipo']);
 		
 			array_push($produtos, $p);
 		}
 			
 		return $produtos;
 	}
 	
 	//busca e retorna o produto pelo campo 'prod_id'
 	public function busca($id)
 	{
 		$id = mysqli_real_escape_string($this->conn, $id);
 		$resultado = $this->verificaProduto($id);
 		if($resultado)
 		{
 			$a = mysqli_fetch_assoc($resultado);
 			$produto = new Produto();
 			$produto->setId($a['prod_id']);
 			$produto->setNome($a['prod_nome']);
 			$produto->setDescricao($a['prod_desc']);
 			$produto->setDesconto($a['prod_desconto']);
 			$produto->setValorUnitario($a['prod_valorunit']);
 			$produto->setQtdEstoque($a['prod_qtdestoque']);
 			$produto->setFornId($a['forn_id']);
 			$produto->setTipo($a['prod_tipo']);
 			
 			return $produto;
 		}
 		else
 		{
 			return false;
 		}
 	}
 	
 	//altera um produto no banco de dados
 	public function altera($id, Produto $p)
 	{
 		$id = mysqli_real_escape_string($this->conn, $id);
 		$resultado = $this->verificaProduto($id);
 			
 		if($resultado)
 		{
 			$nome = mysqli_real_escape_string($this->conn, $p->getNome());
	 		$valorUnit = mysqli_real_escape_string($this->conn, $p->getValorUnitario());
	 		$descricao = mysqli_real_escape_string($this->conn, $p->getDescricao());
	 		$qtdEstoque = mysqli_real_escape_string($this->conn, $p->getQtdEstoque());
	 		$tipo = mysqli_real_escape_string($this->conn, $p->getTipo());
	 		$valorVenda = mysqli_real_escape_string($this->conn, $p->getValorVenda());
	 		$desconto = mysqli_real_escape_string($this->conn, $p->getDesconto());
	 		$fornId = mysqli_real_escape_string($this->conn, $p->getFornId());
 		
 			$query = "UPDATE produto SET prod_nome = '{$nome}', prod_valorunit = {$valorUnit}, prod_desc = '{$descricao}', "
 					."prod_qtdestoque = {$qtdEstoque}, prod_tipo = '{$tipo}', prod_valorvenda = {$valorVenda}, prod_desconto = {$desconto}, "
 					."forn_id = {$fornId} WHERE prod_id = {$id}";
 			return mysqli_query($this->conn, $query);
 		}
 		else
 		{
 			return false;
 		}
 	}
 	
 	//remove um produto do banco de dados
 	public function remove($id)
 	{
 		$id = mysqli_real_escape_string($this->conn, $id);
 		if($this->verificaProduto($id))
 		{
 			$query = "DELETE FROM produto WHERE prod_id = {$id}";
 			return mysqli_query($this->conn, $query);
 		}
 		else
 		{
 			return false;
 		}
 	}
}