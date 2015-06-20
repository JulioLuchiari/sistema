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
	if(!isset($_SESSION['cadastro_produto']))
	{
		$produto = new Produto();
		$_SESSION['cadastro_produto'] = $produto;
	}

	$produto = $_SESSION['cadastro_produto'];

	return $produto;
}

//valida um pre�o qualquer
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

//valida um campo de textarea
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

//valida o desconto de acordo com a regra de neg�cio
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