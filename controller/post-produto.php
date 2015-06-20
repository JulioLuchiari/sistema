<?php
if (eregi("produto.class.php", $_SERVER['SCRIPT_NAME']))
{
	header("Location: ../index.php");
	die();
}

$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$preco = isset($_POST['preco']) ? $_POST['preco'] : null;
$desconto = isset($_POST['desconto']) ? $_POST['desconto'] : null;
$qtdEstoque = isset($_POST['estoque']) ? $_POST['estoque'] : null;
$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : null;
$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : null;
$fornId = isset($_POST['fornecedor']) ? $_POST['fornecedor'] : null; 

$erros = 0;

$produto = new Produto();
$produto->setNome($nome);
$produto->setValorUnitario($preco);
$produto->setDesconto($desconto);
$produto->setQtdEstoque($qtdEstoque);
try 
{
	$produto->setTipo($tipo);
}
catch (Exception $e)
{
	$erros += 1;
}
$produto->setDescricao($descricao);
$produto->setFornId($fornId);

$_SESSION['cadastro_produto'] = $produto;

if(!validaNome($nome) || !validaNumero($qtdEstoque) || !validaDescricao($descricao) || !validaPreco($preco) || !validaDesconto($desconto) || !validaNumero($fornId))
{
	$erros += 1;
}