<?php
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

function validaEmail($email)
{
	if(strlen($email) < 5)
	{
		return false;
	}
	else
	{
		return true;
	}
}

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