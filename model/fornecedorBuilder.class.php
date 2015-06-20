<?php
//evita acesso direto pela url
if (eregi("produto.class.php", $_SERVER['SCRIPT_NAME']))
{
	header("Location: ../index.php");
	die();
}

//classe auxiliar para a cria��o da classe fornecedores, de acordo com o padr�o de projeto Builder
class FornecedorBuilder
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
	
	public function comCnpj($cnpj)
	{
		$this->cnpj = $cnpj;
	}
	
	public function comRazaoSocial($razaoSocial)
	{
		$this->razaoSocial = $razaoSocial;
	}
	
	public function comEndereco($rua, $numero, $bairro, $cidade, $uf, $pais, $cep, $complemento)
	{
		$this->rua = $rua;
		$this->numero = $numero;
		$this->bairro = $bairro;
		$this->cidade = $cidade;
		$this->uf = $uf;
		$this->pais = $pais;
		$this->cep = $cep;
		$this->complemento = $complemento;
	}
	
	public function comTelefone($telefone)
	{
		$this->telefone = $telefone;
	}
	
	public function comEmail($email)
	{
		$this->email = $email;
	}
	
	//"constr�i" o fornecedor
	public function build()
	{
		$fornecedor = new Fornecedor($this->cnpj, $this->razaoSocial, $this->rua, $this->numero, 
									$this->complemento, $this->cep, $this->bairro, $this->cidade, 
									$this->uf, $this->pais, $this->telefone, $this->email);
		return $fornecedor;
	}
}