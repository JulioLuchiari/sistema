<?php
//bloqueia acesso direto pela url
if (eregi("produto.class.php", $_SERVER['SCRIPT_NAME']))
{
	header("Location: ../index.php");
	die();
}

//valida um campo de texto qualquer
function validaNome($nome)
{
	if(strlen($nome) < 3)
	{
		return false;
	}
	else
	{
		return true;
	}
}

//valida um numero inteiro qualquer
function validaNumero($numero)
{
	if(ereg('[0-9]', $numero))
	{
		return true;
	}
	else 
	{
		return false;
	}
}