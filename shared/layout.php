<?php require_once 'config.php';?>
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