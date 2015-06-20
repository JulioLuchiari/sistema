<?php
class Produto
{
	private $id;
	private $fornId;
	private $nome;
	private $tipo;
	private $descricao;
	private $valorUnitario;
	private $valorVenda;
	private $desconto;
	private $qtdEstoque;
	
	public function setId($id)
	{
		$this->id = $id;
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	public function setFornId($id)
	{
		$this->fornId = $id;
	}
	
	public function getFornId()
	{
		return $this->fornId;
	}
	
	public function setNome($nome)
	{
		$this->nome = $nome;
	}
	
	public function getNome()
	{
		return $this->nome;
	}
	
	public function setDescricao($descricao)
	{
		$this->descricao = $descricao;
	}
	
	public function getDescricao()
	{
		return $this->descricao;
	}
	
	public function setValorUnitario($valorUnitario)
	{
		$this->valorUnitario = $valorUnitario;
		$this->valorVenda = $valorUnitario * 1.3;
	}
	
	public function getValorUnitario()
	{
		return $this->valorUnitario;
	}
	
	public function getValorVenda()
	{
		return $this->valorVenda;
	}
	
	public function setDesconto($desconto)
	{
		$this->desconto = $desconto;
	}
	
	public function getDesconto()
	{
		return $this->desconto;
	}
	
	public function setQtdEstoque($qtd)
	{
		$this->qtdEstoque = $qtd;
	}
	
	public function getQtdEstoque()
	{
		return $this->qtdEstoque;
	}
	
	public function setTipo($tipo)
	{
		$this->tipo = $tipo;
		if($tipo === "perecivel")
		{
			$tipo = TipoEnum::PERECIVEL;
		}
		elseif($tipo === "nao perecivel")
		{
			$tipo = TipoEnum::NAO_PERECIVEL;
		}
		else
		{
			throw new Exception();
		}
	}
	
	public function getTipo()
	{
		return $this->tipo;
	}
}