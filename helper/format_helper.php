<?php
//bloqueia acesso direto pela url
if (eregi("produto.class.php", $_SERVER['SCRIPT_NAME']))
{
	header("Location: ../index.php");
	die();
}

//formata um cep utilizando substring
function formataCep($cep)
{
	$part1 = substr($cep, 0, 5);
	$part2 = substr($cep, 5);
	$cep = "{$part1}-{$part2}";
	return $cep;
}

//formata um telefone utilizando substring
function formataTelefone($telefone)
{
	$part1 = substr($telefone, 0, 2);
	if(strlen($telefone) == 10)
	{
		$part2 = substr($telefone, 2, 4);
		$part3 = substr($telefone, 6);
	}
	else
	{
		$part2 = substr($telefone, 2, 5);
		$part3 = substr($telefone, 7);
	}
	$telefone = "({$part1}) {$part2} - {$part3}";
	
	return $telefone;	
}

//formata um endereco com os parametros passados
function formataEndereco($rua, $numero, $bairro, $cidade, $uf)
{
	$endereco = "{$rua}, {$numero} - {$bairro}, {$cidade} - {$uf}";
	return $endereco;
}

//formata um cnpj utilizando substring
function formataCnpj($cnpj)
{
	$part1 = substr($cnpj, 0, 2);
	$part2 = substr($cnpj, 2, 3);
	$part3 = substr($cnpj, 5, 3);
	$part4 = substr($cnpj, 8, 4);
	$part5 = substr($cnpj, 12);
	
	$cnpj = "{$part1}.{$part2}.{$part3}/{$part4}-{$part5}";
	return $cnpj;
}

//formata um preço utilizando substring
function formataPreco($numero)
{
	return "R$ ".number_format($numero, 2, ",", ".");
}

//formata um preço que contenha junto um desconto com valor inteiro de 0 a 100
function formataPrecoComDesconto($valor, $desconto)
{
	$desconto /= 100;
	$valorDescontado = $valor * $desconto;
	$valorTotal = $valor - $valorDescontado;
	return formataPreco($valorTotal);
}