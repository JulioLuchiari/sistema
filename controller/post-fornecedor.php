<?php
if (eregi("produto.class.php", $_SERVER['SCRIPT_NAME']))
{
	header("Location: ../index.php");
	die();
}

$cnpj = isset($_POST['cnpj']) ? ereg_replace('([^a-zA-Z0-9])', '', $_POST['cnpj']) : null;
$razaoSocial = isset($_POST['razao-social']) ? $_POST['razao-social'] : null;
$cep = isset($_POST['cep']) ? ereg_replace('([^0-9])', '', $_POST['cep']) : null;
$rua = isset($_POST['rua']) ? $_POST['rua'] : null;
$numero = isset($_POST['numero']) ? $_POST['numero'] : null;
$complemento = isset($_POST['complemento']) ? $_POST['complemento'] : null;
$bairro = isset($_POST['bairro']) ? $_POST['bairro'] : null;
$cidade = isset($_POST['cidade']) ? $_POST['cidade'] : null;
$uf = isset($_POST['uf']) ? $_POST['uf'] : null;
$pais = isset($_POST['pais']) ? $_POST['pais'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$telefone = isset($_POST['telefone']) ? ereg_replace('([^0-9])', '', $_POST['telefone']) : null;

$erros = 0;

$fornecedor = new Fornecedor($cnpj, $razaoSocial, $rua, $numero, $complemento, $cep, $bairro, $cidade, $uf, $pais, $telefone, $email);

//armazena o fornecedor na sessão, caso haja algum erro, o formulario estará preenchido com os dados da sessão
$_SESSION['cadastro_fornecedor'] = $fornecedor;

if(!validaCnpj($cnpj) || !validaNome($razaoSocial))
{
	$erros += 1;
}

if(!validaNome($rua) || !validaNome($complemento) || !validaNome($bairro) || !validaNome($cidade) || !validaNome($pais))
{
	$erros += 1;
}

if(!validaCep($cep) || !validaNumero($numero))
{
	$erros += 1;
}

if(!validaEmail($email) || !validaNumero($telefone))
{
	$erros += 1;
}