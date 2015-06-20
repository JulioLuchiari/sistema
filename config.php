<?php
//evita acesso direto pela url
if (eregi("produto.class.php", $_SERVER['SCRIPT_NAME']))
{
	header("Location: index.php");
	die();
}
//configura o charset da aplicação
header("Content-type: text/html; charset=iso-8859-1");
require_once 'helper/url_helper.php';
require_once 'helper/mostra-alerta.php';
require_once 'DAO/conecta.class.php';
session_start();

//autoload das classes principais
function __autoload($classe)
{
	require_once "model/{$classe}.class.php";
}

//conecta com o banco de dados da aplicação
$db = new Conecta("localhost", "sistema", "sistema123", "sistema");
$conn = $db->conectaMySql();