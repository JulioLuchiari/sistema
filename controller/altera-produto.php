<?php
//evita acesso direto pela url
if (eregi("altera-produto.php", $_SERVER['SCRIPT_NAME']))
{
	header("Location: ../index.php");
	die();
}

require_once '../config.php';
require_once '../DAO/produtoDAO.php';
require_once '../helper/validadores.php';
require_once '../helper/validador-produto.php';
require_once 'post-produto.php';

//verifica se o id est� realmente sendo utilizado
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
	header("Location: ".base_url("formulario-altera-produto.php"));
	die();
}

//executa a altera��o do produto
$dao = new ProdutoDAO($conn);
if($dao->altera($id, $produto))
{
	$_SESSION['sucesso'] = "Produto alterado com sucesso!";
	unset($_SESSION['cadastro_produto']);
	header("Location: ".base_url("produto.php"));
}
else
{
	$_SESSION['erro'] = "Erro no servidor, tente novamente mais tarde!";
	header("Location: ".base_url("produto.php"));
}