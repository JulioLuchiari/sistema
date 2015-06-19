<?php
header("Content-type: text/html; charset=utf-8");
require_once 'DAO/conecta.class.php';

$db = new Conecta("localhost", "sistema", "sistema123", "sistema");
$conn = $db->conectaMySql();