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
}