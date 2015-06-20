<?php
//evita acesso direto pela url
if (eregi("post-produto.php", $_SERVER['SCRIPT_NAME']))
{
	header("Location: ../index.php");
	die();
}

//verifica os campos
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$preco = isset($_POST['preco']) ? $_POST['preco'] : null;
$desconto = isset($_POST['desconto']) ? $_POST['desconto'] : null;
$qtdEstoque = isset($_POST['estoque']) ? $_POST['estoque'] : null;
$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : null;
$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : null;
$fornId = isset($_POST['fornecedor']) ? $_POST['fornecedor'] : null; 

//inicializada a variável de erros
$erros = 0;


$produto = new Produto();
$produto->setNome($nome);
$produto->setValorUnitario($preco);
$produto->setDesconto($desconto);
$produto->setQtdEstoque($qtdEstoque);
$produto->setTipo($tipo);
$produto->setDescricao($descricao);
$produto->setFornId($fornId);

//armazena o produto na sessão,  caso haja algum erro, o formulario estará preenchido com os dados da sessão
$_SESSION['cadastro_produto'] = $produto;

//valida os campos
if(!validaNome($nome) || !validaNumero($qtdEstoque) || !validaDescricao($descricao) || !validaPreco($preco) || !validaDesconto($desconto) || !validaNumero($fornId))
{
	$erros += 1;
}