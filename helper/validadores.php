<?php
if (eregi("produto.class.php", $_SERVER['SCRIPT_NAME']))
{
	header("Location: ../index.php");
	die();
}

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