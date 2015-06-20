<?php
if (eregi("produto.class.php", $_SERVER['SCRIPT_NAME']))
{
	header("Location: ../index.php");
	die();
}

require_once '../config.php';
require_once '../DAO/fornecedorDAO.php';

if(isset($_POST['id']))
{
	$id = $_POST['id'];
}
else
{
	header("Location: ".base_url("mostra-fornecedor.php?id={$id}"));
	die();
}

$dao = new FornecedorDAO($conn);
if($dao->remove($id))
{
	$_SESSION['sucesso'] = "Fornecedor removido com sucesso!";
	header("Location: ".base_url("fornecedor.php"));
}
else
{
	$_SESSION['erro'] = "Erro no servidor, tente novamente mais tarde!";
	header("Location: ".base_url("fornecedor.php"));
}