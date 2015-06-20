<?php
if (eregi("produto.class.php", $_SERVER['SCRIPT_NAME']))
{
	header("Location: ../index.php");
	die();
}

require_once '../config.php';
require_once '../DAO/produtoDAO.php';

if(isset($_POST['id']))
{
	$id = $_POST['id'];
}
else
{
	header("Location: ".base_url("mostra-produto.php?id={$id}"));
	die();
}

$dao = new ProdutoDAO($conn);
if($dao->remove($id))
{
	$_SESSION['sucesso'] = "Produto removido com sucesso!";
	header("Location: ".base_url("produto.php"));
}
else
{
	$_SESSION['erro'] = "Erro no servidor, tente novamente mais tarde!";
	header("Location: ".base_url("produto.php"));
}