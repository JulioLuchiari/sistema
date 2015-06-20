<?php
//evita acesso direto pela url
if (eregi("cadastra-fornecedor.php", $_SERVER['SCRIPT_NAME']))
{
	header("Location: ../index.php");
	die();
}

require_once '../config.php';
require_once '../DAO/fornecedorDAO.php';
require_once '../helper/validadores.php';
require_once '../helper/validador-fornecedor.php';
require_once 'post-fornecedor.php';

//verifica se contem erros
if($erros > 0)
{
	$_SESSION['erro'] = "Dados incorretos, verifique e tente novamente";
	header("Location: ".base_url("formulario-fornecedor.php"));
	die();
}

//executa a adição de um novo fornecedor
$dao = new FornecedorDAO($conn);
if($dao->salva($fornecedor))
{
	$_SESSION['sucesso'] = "Fornecedor cadastrado com sucesso!";
	unset($_SESSION['cadastro_fornecedor']);
	header("Location: ".base_url("fornecedor.php"));
}
else
{
	$_SESSION['erro'] = "Erro no servidor, tente novamente mais tarde!";
	header("Location: ".base_url("fornecedor.php"));
}