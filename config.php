<?php
header("Content-type: text/html; charset=utf-8");
require_once 'helper/url_helper.php';
require_once 'DAO/conecta.class.php';

function __autoload($classe)
{
	require_once "model/{$classe}.class.php";
}

$db = new Conecta("localhost", "sistema", "sistema123", "sistema");
$conn = $db->conectaMySql();