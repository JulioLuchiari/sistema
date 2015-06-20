<?php
//bloqueia acesso direto pela url
if (eregi("url_helper.php", $_SERVER['SCRIPT_NAME']))
{
	header("Location: ../index.php");
	die();
}

//define a url da aplicaчуo
function base_url($nome = null)
{
	return "http://localhost/sistema/{$nome}";
}