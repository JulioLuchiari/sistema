<?php
if (eregi("produto.class.php", $_SERVER['SCRIPT_NAME']))
{
	header("Location: ../index.php");
	die();
}

function base_url($nome = null)
{
	return "http://localhost/sistema/{$nome}";
}