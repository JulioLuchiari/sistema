<?php
class Fornecedor
{
	private $id;
	private $cnpj;
	private $razaoSocial;
	private $rua;
	private $numero;
	private $complemento;
	private $cep;
	private $bairro;
	private $cidade;
	private $uf;
	private $pais;
	private $telefone;
	private $email;
	
	public function __construct($cnpj, $razaoSocial, $rua, $numero, $complemento, $cep, $bairro, $cidade, $uf, $pais, $telefone, $email)
	{
		$this->cnpj = $cnpj;
		$this->razaoSocial = $razaoSocial;
		$this->rua = $rua;
		$this->numero = $numero;
		$this->bairro = $bairro;
		$this->cidade = $cidade;
		$this->uf = $uf;
		$this->pais = $pais;
		$this->cep = $cep;
		$this->complemento = $complemento;
		$this->telefone = $telefone;
		$this->email = $email;
	}
	
	public function setId($id)
	{
		$this->id = $id;
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	public function getCnpj()
	{
		return $this->cnpj;
	}
	
	public function getRazaoSocial()
	{
		return $this->razaoSocial;
	}
	
	public function getRua()
	{
		return $this->rua;
	}
	
	public function getNumero()
	{
		return $this->numero;
	}
	
	public function getBairro()
	{
		return $this->bairro;
	}
	
	public function getCidade()
	{
		return $this->cidade;
	}
	
	public function getUf()
	{
		return $this->uf;
	}
	
	public function getPais()
	{
		return $this->pais;
	}
	
	public function getCep()
	{
		return $this->cep;
	}
	
	public function getComplemento()
	{
		return $this->complemento;
	}
	
	public function getTelefone()
	{
		return $this->telefone;
	}
	
	public function getEmail()
	{
		return $this->email;
	}
}