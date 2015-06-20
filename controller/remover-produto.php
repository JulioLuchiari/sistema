<?php
//evita acesso direto pela url
if (eregi("remover-produto.php", $_SERVER['SCRIPT_NAME']))
{
	header("Location: ../index.php");
	die();
}

require_once '../config.php';
require_once '../DAO/produtoDAO.php';

//verifica se o id está realmente sendo utilizado
if(isset($_POST['id']))
{
	$id = $_POST['id'];
}
else
{
	header("Location: ".base_url("mostra-produto.php?id={$id}"));
	die();
}

//executa a deletação do produto
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