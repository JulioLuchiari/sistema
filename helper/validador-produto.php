<?php
if (eregi("produto.class.php", $_SERVER['SCRIPT_NAME']))
{
	header("Location: ../index.php");
	die();
}

function retornaDados()
{
	if(!isset($_SESSION['cadastro_produto']))
	{
		$produto = new Produto();
		$_SESSION['cadastro_produto'] = $produto;
	}

	$produto = $_SESSION['cadastro_produto'];

	return $produto;
}

function validaPreco($preco)
{
	if($preco <= 0)
	{
		return false;
	}
	else
	{
		return true;
	}
}

function validaDescricao($descricao)
{
	if(strlen($descricao) < 10)
	{
		return false;
	}
	else
	{
		return true;
	}
}

function validaDesconto($desconto)
{
	if($desconto <= 0)
	{
		return false;
	}
	elseif($desconto > 12)
	{
		return false;
	}
	else
	{
		return true;
	}
}