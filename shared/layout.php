<?php 
if (eregi("produto.class.php", $_SERVER['SCRIPT_NAME']))
{
	header("Location: ../index.php");
	die();
}
require_once 'config.php';
?>
<html>
<head>
	<title><?php echo $titulo ?></title>
	<link rel="stylesheet" href="content/css/template.css">
</head>
<body>
	<div class="main">
		<h1 class="titulo"><?php echo $titulo ?></h1>
		<?php mostraAlerta("sucesso")?>
		<?php mostraAlerta("erro")?>
		<?php echo $conteudo ?>
	</div>
</body>
</html>