<?php
//bloqueia acesso direto pela url
if (eregi("produto.class.php", $_SERVER['SCRIPT_NAME']))
{
	header("Location: ../index.php");
	die();
}

//retorna os dados preenchidos no formulario
function retornaDados()
{
	if(!isset($_SESSION['cadastro_fornecedor']))
	{
		$fornecedor = new Fornecedor("", "", "", 0, "", "", "", "", "", "", "", "");
		$_SESSION['cadastro_fornecedor'] = $fornecedor;
	}

	$fornecedor = $_SESSION['cadastro_fornecedor'];

	return $fornecedor;
}

//valida um cnpj
function validaCnpj($cnpj)
{
	$cnpj = ereg_replace("([^a-zA-Z0-9])", "", $cnpj);
	if(strlen($cnpj) != 14)
	{
		return false;
	}
	else
	{
		return true;
	}
}

//valida um cep
function validaCep($cep)
{
	if(strlen($cep) != 8)
	{
		return false;
	}
	elseif(ereg('[0-9]', $cep))
	{
		return true;
	}
	else
	{
		return false;
	}
}

//valida um email
function validaEmail($email)
{
	if (ereg('^([a-zA-Z0-9.-])*([@])([a-z0-9])*([.])([a-z])', $email))
	{
		return true;
	}
	else
	{
		return false;
	}
}

//valida uma UF
function validaUf($uf)
{
	if(strlen($uf) != 2)
	{
		return false;
	}
	else
	{
		return true;
	}
}