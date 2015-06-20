<?php
//evita acesso direto pela url
if (eregi("produto.class.php", $_SERVER['SCRIPT_NAME']))
{
	header("Location: ../index.php");
	die();
}

require_once '../config.php';
require_once '../DAO/produtoDAO.php';
require_once '../helper/validadores.php';
require_once '../helper/validador-produto.php';
require_once 'post-produto.php';

//verifica se contem erros
if($erros > 0)
{
	$_SESSION['erro'] = "Dados incorretos, verifique e tente novamente";
	header("Location: ".base_url("formulario-produto.php"));
	die();
}

//executa a adição de um novo produto
$dao = new ProdutoDAO($conn);
if($dao->salva($produto))
{
	$_SESSION['sucesso'] = "Produto cadastrado com sucesso!";
	unset($_SESSION['cadastro_produto']);
	header("Location: ".base_url("produto.php"));
}
else
{
	$_SESSION['erro'] = "Erro no servidor, tente novamente mais tarde!";
	header("Location: ".base_url("produto.php"));
}