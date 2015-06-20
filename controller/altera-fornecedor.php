<?php
//evita acesso direto pela url
if (eregi("altera-fornecedor.php", $_SERVER['SCRIPT_NAME']))
{
	header("Location: ../index.php");
	die();
}

require_once '../config.php';
require_once '../DAO/fornecedorDAO.php';
require_once '../helper/validadores.php';
require_once '../helper/validador-fornecedor.php';
require_once 'post-fornecedor.php';

//verifica se o id está realmente sendo utilizado
if(isset($_POST['id']))
{
	$id = $_POST['id'];
}
else
{
	$erros += 1;
}

//verifica se contem erros
if($erros > 0)
{
	$_SESSION['erro'] = "Dados incorretos, verifique e tente novamente";
	header("Location: ".base_url("formulario-altera-fornecedor.php?id={$id}"));
	die();
}

//executa a alteração do fornecedor
$dao = new FornecedorDAO($conn);
if($dao->altera($id, $fornecedor))
{
	$_SESSION['sucesso'] = "Fornecedor alterado com sucesso!";
	unset($_SESSION['cadastro_fornecedor']);
	header("Location: ".base_url("fornecedor.php"));
}
else
{
	$_SESSION['erro'] = "Erro no servidor, tente novamente mais tarde!";
	header("Location: ".base_url("fornecedor.php"));
}